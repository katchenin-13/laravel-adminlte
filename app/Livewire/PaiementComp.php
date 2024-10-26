<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Paiement;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PaiementComp extends Component
{
    public $paiement;
    public $montant;
    public $editpaiementid;
    public $selectedPaiement;
    public $showDeleteModal = false;
    public $search = "";
    public $selectedClient;
    public $clientLivraisons = [];
    public $clientsData;
    public $tarification_total;

    public function mount()
    {
        // Initialiser les données des clients
        $this->loadClientsData();
    }

    public function loadClientsData()
    {
        $startOfMonth=Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $this->clientsData = DB::table('clients')
            ->leftJoin('colis', 'clients.id', '=', 'colis.client_id')
            ->leftJoin('categories', 'colis.categorie_id', '=', 'categories.id')
            ->leftJoin('tarifications', 'categories.id', '=', 'tarifications.categorie_id')
            ->leftJoin('livraisons', 'colis.id', '=', 'livraisons.colis_id')
            ->leftJoin('statuts', 'livraisons.statut_id', '=', 'statuts.id')
            ->where('statuts.nom', 'livrer')
            ->select(
                'clients.id',
                'clients.nom',

                'clients.uuid',
                DB::raw('COUNT(livraisons.id) as nombre_livraisons'),
                DB::raw('SUM(tarifications.prix) as tarification_total')
            )
            ->groupBy('clients.id', 'clients.nom','clients.uuid')
            ->get();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";


        // Rechercher des paiements en fonction du nom ou prénom du client
        $paiements = Paiement::whereHas('client', function ($query) use ($searchCriteria) {
            $query->where('nom', 'like', $searchCriteria)
                  ->orWhere('uuid', 'like', $searchCriteria);
        })->paginate(10);



        return view('livewire.paiement.list', [
            'paiements' => $paiements,
            'clientsData' => $this->clientsData,
        ])->extends("layouts.app")
          ->section("content");
    }

    // public function cinetpay($clientId)
    // {

    //     $client = Client::find($clientId);

        // $this->tarification_total = $this->clientsData->where('id', $clientId)->first()->tarification_total;

    //     dd($clientId);
    //     $this->dispatch('OpenModal', $client->id); // Émettre un événement pour ouvrir la modale
    // }

    public function cinetpay($clientId)
    {
        $this->selectedClient = $clientId;
        $this->dispatch("OpenModal", []);
    }
}

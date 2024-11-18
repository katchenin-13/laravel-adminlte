<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Client;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Test extends Component

{
    public $SelectedTest= "";
    public $clientsData;
    public $selectedClient="";
    public $tarification_total;
    public $montant;

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

        // $searchCriteria = "%" . $this->search . "%";


        // Rechercher des paiements en fonction du nom ou prénom du client
        // $tests = Test::whereHas('client', function ($query) use ($searchCriteria) {
        //     $query->where('nom', 'like', $searchCriteria)
        //           ->orWhere('uuid', 'like', $searchCriteria);
        // })->paginate(10);

        return view('livewire.test.list', [
            'clientsData' => $this->clientsData,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    // public function showProp(Client $client)
    // {
    //     $this->selectedClient = $client;
    //     $this->tarification_total = $this->clientsData->where('id', $clientId)->first()->tarification_total;
    //     $this->dispatch("showModal", []);
    //     // dd($client);
    // }

    public function showProp($clientId)
    {
        $client = $this->clientsData->where('id', $clientId)->first();
    
        if ($client) {
            $this->selectedClient = $client->nom;
            $this->tarification_total = $client->tarification_total ?? 0;
            
            $this->dispatch("showModal", [
                'tarificationTotal' => $this->tarification_total,
            ]);
        } else {
            // Gérer le cas où le client n'est pas trouvé
            $this->selectedClient = "";
            $this->tarification_total = 0;
        }
    }
}

<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Paiement;
use Illuminate\Support\Facades\DB;

class PayementComp extends Component
{
    public $paiement;
    public $montant;
    public $mois;
    public $année;
    public $selectedStatut;
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

        return view('livewire.Payement.index', [
            'paiements' => $paiements,
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
    public function newPaiement()
    {
        // Vérification du paiement précédent
        // $previousMonth = Carbon::parse($this->mois)->subMonth();
        // $previousPaymentExists = Paiement::where('client_id', $this->selectedClient)
        //     ->where('mois', $previousMonth->format('Y-m'))
        //     ->exists();
    
        // if (!$previousPaymentExists) {
        //     session()->flash('warning', 'Attention: Aucun paiement enregistré pour le mois précédent ('.$previousMonth->format('Y-m').').');
        //     return;
        // }
    
        // Validation des entrées
        $this->validate([
            'montant' => 'required|numeric|min:0',
            'mois' => 'required|numeric|between:1,12',
             'année' => 'required|digits:4',
            'selectedClient' => 'required|exists:clients,id',
        ]);
    
        // Calcul du montant total des livraisons
        $total = DB::table('clients')
            ->leftJoin('colis', 'clients.id', '=', 'colis.client_id')
            ->leftJoin('categories', 'colis.categorie_id', '=', 'categories.id')
            ->leftJoin('tarifications', 'categories.id', '=', 'tarifications.categorie_id')
            ->leftJoin('livraisons', 'colis.id', '=', 'livraisons.colis_id')
            ->leftJoin('statuts', 'livraisons.statut_id', '=', 'statuts.id')
            ->where('clients.id', $this->selectedClient)
            ->where('statuts.nom', 'livrer')
            ->whereMonth('livraisons.created_at', $this->mois)
            ->whereYear('livraisons.created_at', $this->année)
            ->sum('tarifications.prix');
    
        // Vérification du montant
        if ($this->montant < $total) {
            session()->flash('error', 'Le montant doit être supérieur ou égal au montant total des livraisons ('.$total.').');
            return;
        }
    
        // Enregistrement du paiement
        Paiement::create([
            'client_id' => $this->selectedClient,
            'montant' => $this->montant,
            'mois' => $this->mois,
            'année' => $this->année,
            'statut_id' => ($this->montant >= $total) ? 1 : 2,
        ]);
    
        session()->flash('message', 'Paiement enregistré avec succès.');
        $this->reset(['selectedClient', 'montant', 'mois', 'année']);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal", []);
    }
}

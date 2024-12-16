<?php

namespace App\Livewire;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Paiement;
use Illuminate\Support\Facades\DB;

class PayementComp extends Component
{
    public $paiement;
    public $montantT;
    public $moisT;
    public $annéeT;
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

    public function cinetplay()
    {

        return view('livewire.Payement.cinetpay');
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



         $validatedData = $this->validate([
            "montantT" => 'required|numeric|min:0',
            "moisT" => "required|numeric|between:1,12",
            "annéeT" => 'required|digits:4',
            "selectedClient" => 'required|exists:clients,id',
        ], [
            "montantT.required" => "veuillez entrer un montant.",
            "montantT.numeric" => "le montant doit être numérique.",
            "moisT.required" => "veuillez selectionner le mois.",
            "annéeT.required" => "veuillez selectionner l'année.",
        ]);


        // Validation des entrées
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
    }else{
         // Enregistrement du paiement
        $uuid = Uuid::uuid4()->toString();

        Paiement::create([
            "uuid" => $uuid,
            "montant_t" => $validatedData["montantT"],
            "mois" => $validatedData["moisT"],
            "année" => $validatedData["annéeT"],
            "client_id" => $validatedData["selectedClient"],
            'statut_id' => ($this->montant >= $total) ? 1 : 2,
        ]);

    }

        session()->flash('message', 'Paiement enregistré avec succès.');

        $this->resetTarificationForNextMonth();
        $this->reset(['selectedClient', 'montant_t', 'mois', 'année']);
    }

    public function resetTarificationForNextMonth()
    {
        // Calculer le mois et l'année suivants
        $nextMonth = Carbon::now()->addMonth();
        $nextMonthNumber = $nextMonth->month;
        $nextYear = $nextMonth->year;

        // Réinitialiser les prix de tarification pour ce mois
        DB::table('tarifications')
            ->whereMonth('created_at', $nextMonthNumber)
            ->whereYear('created_at', $nextYear)
            ->update(['prix' => 0]); // Vous pouvez ajuster cette logique si nécessaire
    }

    public function closeModal()
    {
        $this->dispatch("closeModal", []);
    }
}

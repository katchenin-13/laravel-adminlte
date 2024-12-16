<?php

namespace App\Livewire;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Client;
use Livewire\Component;
use App\Models\Paiement;
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
    public $mois;
    public $année;
    public $tarification_total;

    public function mount()
    {
        // Initialiser les données des clients
        $this->loadClientsData();
    }

    public function loadClientsData()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $this->clientsData = Client::with(['colis.livraisons', 'colis.categorie.tarifications', 'colis.livraisons.statut'])
            ->whereHas('colis.livraisons', function ($query) {
                $query->where('statuts.nom', 'livrer');
            })
            ->select('clients.id', 'clients.nom', 'clients.uuid')
            ->get()
            ->map(function ($client) {
                $client->nombre_livraisons = $client->colis->flatMap(function ($colis) {
                    return $colis->livraisons;
                })->count();
                $client->tarification_total = $client->colis->flatMap(function ($colis) {
                    return $colis->tarifications;
                })->sum('prix');
                return $client;
            });
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

        return view('livewire.payement.list', [
            'paiements' => $paiements,
            'clientsData' => $this->clientsData,
        ])->extends("layouts.app")
          ->section("content");
    }

    public function newPaiement()
    {
        // Vérifiez que le client est sélectionné
        if (!$this->selectedClient) {
            session()->flash('error', 'Veuillez sélectionner un client.');
            return;
        }

        // Calculer le montant total des livraisons pour le client dans le mois et l'année spécifiés
        $total = DB::table('clients')
            ->leftJoin('colis', 'clients.id', '=', 'colis.client_id')
            ->leftJoin('categories', 'colis.categorie_id', '=', 'categories.id')
            ->leftJoin('tarifications', 'categories.id', '=', 'tarifications.categorie_id')
            ->leftJoin('livraisons', 'colis.id', '=', 'livraisons.colis_id')
            ->leftJoin('statuts', 'livraisons.statut_id', '=', 'statuts.id')
            ->where('clients.id', $this->selectedClient)
            ->where('statuts.nom', 'livrer')
            ->whereMonth('livraisons.created_at', $this->mois) // Utilisez la propriété mois
            ->whereYear('livraisons.created_at', $this->année) // Utilisez la propriété année
            ->sum('tarifications.prix');

        // Vérifiez si le montant est valide
        if ($this->montant < $total) {
            session()->flash('error', 'Le montant doit être supérieur ou égal au montant total des livraisons ('.$total.').');
            return;
        }

        // Définir le statut automatiquement en fonction du montant
        $statutId = ($this->montant >= $total) ? 1 : 2; // 1 = payé, 2 = non payé (vous pouvez ajuster ces valeurs)

        // Enregistrer le paiement

        $validated = $this->validate([
            "montant" => 'required|numeric|min:0',
            "mois" => "required|numeric|between:1,12",
            "année" => 'required|digits:4',
            "selectedClient" => 'required|exists:clients,id',
        ], [
            "montant.required" => "veuillez entrer un montant.",
            "montant.numeric" => "le montant doit être numérique.",
            "mois.required" => "veuillez selectionner le mois.",
            "année.required" => "veuillez selectionner l'année.",
            "année.digits" => "seulement que 4 chiffres.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Paiement::create([
        "uuid" => $uuid,
            'client_id' => $this->selectedClient,
            'montant' => $this->montant,
            'mois' => $this->mois, // Assurez-vous de définir cette propriété
            'année' => $this->année, // Assurez-vous de définir cette propriété
            'statut_id' => $statutId, // Utilisez le statut calculé
        ]);

        session()->flash('message', 'Paiement enregistré avec succès.');

        // Réinitialiser les tarifs pour le mois suivant
        $this->resetTarificationForNextMonth();

        // Réinitialiser les champs ou effectuer d'autres actions
        $this->reset(['selectedClient', 'montant', 'mois', 'année']); // Réinitialiser si nécessaire
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

    public function showPropC(Client $client)
    {
        $this->selectedClient = $client;

        $this->dispatch("ModalCreate", []);

        dd($client);
    }
}

<?php

namespace App\Livewire;

use App\Models\Colis;
use App\Models\Client;
use App\Models\Statut;
use App\Models\Coursier;
use App\Models\Livraison;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

class LivraisonComp extends Component
{
    use WithPagination;

    public $search = "";
    public $livraison;
    public $newDestinataireName = "";
    public $newLivraisonsPhone = "";
    public $newLivraisonsAdd = "";
    public $editDestinataireName = "";
    public $editLivraisonsPhone = "";
    public $editLivraisonsAdd = "";
    public $editLivraisonsid;
    public $selectedLivraison;
    public $selectedCoursiers;
    public $selectedColis;
    public $selectedStatut;
    public $selectedClient;
    public $statutType = 'livraison';
    public $showDeleteModal = false;

    protected $paginationTheme = "bootstrap";

    public function render()
{
    Carbon::setLocale("fr");

    $searchCriteria = "%" . $this->search . "%";

    // Obtenir l'utilisateur connecté
    $user = auth()->user();

    $livraisonsQuery = Livraison::query();

    if ($user->hasRole('superadmin') || $user->hasRole('manager')) {
        // Afficher toutes les livraisons
        $livraisonsQuery->where(function($query) use ($searchCriteria) {
            $query->where('destinataire', 'like', $searchCriteria)
                  ->orWhere('uuid', 'like', $searchCriteria)
                  ->orWhere('numerodes', 'like', $searchCriteria)
                  ->orWhere('adresse_livraison', 'like', $searchCriteria);
        });
    } elseif ($user->hasRole('coursier')) {
        if ($user->coursier) {
            $livraisonsQuery->where('coursier_id', $user->coursier->id)
                ->where(function($query) use ($searchCriteria) {
                    $query->where('destinataire', 'like', $searchCriteria)
                          ->orWhere('uuid', 'like', $searchCriteria)
                          ->orWhere('numerodes', 'like', $searchCriteria)
                          ->orWhere('adresse_livraison', 'like', $searchCriteria);
                });
        } else {
            dd('Il n\'y a pas de coursier associé');
        }
    }

    $livraisons = $livraisonsQuery->paginate(10);

    // Filtrer les colis en fonction du rôle de l'utilisateur
    $colisQuery = Colis::query();
    if ($user->hasRole('coursier')) {
        $colisQuery->where('coursier_id', $user->coursier->id); // Associer les colis au coursier
    }

    // Trier les colis en fonction du coursier
    $colis = $colisQuery->get(); // Récupérer les colis filtrés

    // Récupérer les statuts, coursiers et clients
    $statuts = Statut::where('statut_type', $this->statutType)->get();
    $coursiers = Coursier::all();
    $clients = Client::all();

    return view('livewire.livraison.index', [
        'livraisons' => $livraisons,
        'coursiers' => $coursiers,
        'statuts' => $statuts,
        'colis' => $colis,
        'clients' => $clients,
    ])
    ->extends("layouts.app")
    ->section("content");
}

    public function addNewLivraison()
    {
        $validatedData = $this->validate([
            "newDestinataireName" => "required|max:20",
            "newLivraisonsPhone" => "required|max:10|unique:livraisons,numerodes",
            "newLivraisonsAdd" => "required|max:50|unique:livraisons,adresse_livraison",
            "selectedColis" => "required",
            "selectedCoursiers" => "required",
            "selectedStatut" => "required",
            "selectedClient" => "required",
        ], [
            "newDestinataireName.required" => "Le champ du nom du destinataire est requis.",
            "newDestinataireName.max" => "Le nom du destinataire ne peut pas dépasser :max caractères.",
            "newLivraisonsPhone.max" => "Le téléphone du destinataire ne peut pas dépasser :max caractères.",
            "newLivraisonsPhone.regex" => "Le champ du téléphone ne peut contenir que des chiffres.",
            "newLivraisonsAdd.required" => "Le champ adresse du destinataire est requis.",
            "newLivraisonsAdd.max" => "L'adresse du destinataire ne peut pas dépasser :max caractères.",
            "selectedCoursiers.required" => "Veuillez sélectionner un coursier.",
            "selectedColis.required" => "Veuillez sélectionner un colis.",
            "selectedStatut.required" => "Veuillez sélectionner un statut.",
            "selectedClient.required" => "Veuillez sélectionner le client.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Livraison::create([
            'status_updated' => false,
            "uuid" => $uuid,
            "destinataire" => $validatedData["newDestinataireName"],
            "numerodes" => $validatedData["newLivraisonsPhone"],
            "adresse_livraison" => $validatedData["newLivraisonsAdd"],
            "colis_id" => $validatedData["selectedColis"],
            "statut_id" => $validatedData["selectedStatut"],
            "coursier_id" => $validatedData["selectedCoursiers"],
            "client_id" => $validatedData["selectedClient"],
        ]);

        session()->flash('message', 'La livraison a été enregistrée avec succès!');
        $this->reset([
            'newDestinataireName',
            'newLivraisonsPhone',
            'newLivraisonsAdd',
            'selectedColis',
            'selectedCoursiers',
            'selectedStatut',
            'selectedClient'
        ]);
    }

    public function updateLivraison(Livraison $livraison)
    {
        $validated = $this->validate([
            "editDestinataireName" =>"required|max:20",
            "editLivraisonsPhone" =>"required|max:10|unique:livraisons,numero_telephone",
            "editLivraisonsAdd" =>"required|max:50|unique:livraisons,adresse_livraison",
            "selectedCoursiers" => "required",
            "selectedColis" => "required",
            "selectedClient" => "required",

       ], [
        "editDestinataireName.required" => "Le champ du nom du livraison est requis.",
        "editDestinataireName.max" => "Le nom du livraison ne peut pas dépasser :max caractères.",
        "editLivraisonsPhone.max" => "Le téléphone du livraison ne peut pas dépasser :max caractères.",
        "editLivraisonsPhone.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
        "editLivraisonsAdd.required" => "Le champ adresse du destinataire est requis.",
        "editLivraisonsAdd.max" => "L'adresse du destinataire ne peut pas dépasser :max caractères.",
        "selectedCoursiers.required" => "Veuillez sélectionner un coursiers.",
        "selectedColis.required" => "Veuillez sélectionner un colis.",
        "selectedStatus.required" => "Veuillez sélectionner un Statut.",
        "selectedClient.required" => "Veuillez sélectionner le client.",
       ]);

        $livraison->update([
        'destinataire' => $this->editDestinataireName,
        'numerodes' => $this->editLivraisonPhone,
        'adresse_livraison' => $this->editLivraisonAdd,
        ]);
        session()->flash('message', "La livraison a été mis à jour avec succès !");
        $this->closeEditModal();


    }

        // public function generatePDF()
    // {
    //     $livraisons = Livraison::all();
    //     $data = [
    //         'livraisons' => $livraisons
    //     ];
    //     $pdf = PDF::loadView('livewire.bordereau.index', [$data]);
    //     return $pdf->download('bordereau.pdf');
    // }


    public function updateCoursier($livraisonId, $coursierId)
    {
        $livraison = Livraison::findOrFail($livraisonId);
        $livraison->coursier_id = $coursierId;
        $livraison->save();

    }

    public function updateColis($livraisonId, $colisId)
    {
        $livraison = Livraison::findOrFail($livraisonId);
        $livraison->colis_id = $colisId;
        $livraison->save();

    }

    public function updateStatut($livraisonId, $statutId)
    {
        $livraison = Livraison::findOrFail($livraisonId);
        $livraison->statuts_id = $statutId;
        $livraison->save();

    }

    public function showProp(Livraison $livraison)
    {
        $this->selectedLivraison = $livraison;
        $this->dispatch("CreateModal", []);
    }

    public function showPropC(Livraison $livraison)
    {
        $this->selectedLivraison= $livraison;
        $this->dispatch("ReadModal", []);

    }

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal", []);
    }


    public function showPropE(Livraison $livraison)
    {
        $editLivraison = $livraison;
        $this->editLivraisonsid = $editLivraison->id;
        $this->editDestinataireName= $editLivraison->nom;
        $this->editLivraisonsPhone = $editLivraison->prenom;
        $this->editLivraisonsAdd = $editLivraison->email;

        $selectedCoursiers = Coursier::find($editLivraison->coursier_id);

        if ($selectedCoursiers) {

            $this->selectedCoursiers = $selectedCoursiers->id;
        } else {

            $this->selectedCoursiers = null;
        }

        $selectedColis = Colis::find($editLivraison->colis_id);

        if ($selectedColis) {
            $this->selectedColis = $selectedColis->id;
        } else {

            $this->selectedColis = null;
        }

        $selectedStatut = Statut::find($editLivraison->statut_id);

        if ($selectedStatut) {
            $this->selectedStatut = $selectedStatut->id;
        } else {

            $this->selectedStatut = null;
        }

        $this->dispatch("EditModal", [$livraison->destinataire,$livraison->numerodes,$livraison->adresse_livraison,$livraison->numerodes,$livraison->selectedStatut,$livraison->selectedColis,$livraison->selectedCoursiers]);
    }

    public function showPropD(Livraison $livraison)
    {
        $this->selectedLivraison= $livraison;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteLivraison()
    {
        if ($this->selectedLivraison) {
            $this->selectedLivraison->delete();
            $this->dispatch('livraisonDeleted');
        }
    }

    public function closeModal()
    {
        $this->dispatch("closeModal", []);
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal", []);
    }

    public function closeshowModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeshowModal", []);
    }
}

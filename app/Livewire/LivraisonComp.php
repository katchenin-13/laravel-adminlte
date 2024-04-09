<?php

namespace App\Livewire;

use App\Models\Colis;
use App\Models\Statut;
use Livewire\Component;
use App\Models\Coursier;
use App\Models\Livraison;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class LivraisonComp extends Component
{
    use WithPagination;

    public $search = "";
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
    public $showDeleteModal = false;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $livraisons = Livraison::where("destinataire", "like", $searchCriteria)->latest()->paginate(10);

        $coursiers = Coursier::all();
        $colis = Colis::all();
        $statuts = Statut::all();

        return view('livewire.livraison.index', compact('livraisons', 'coursiers', 'statuts', 'colis'))
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
        ], [
            "newDestinataireName.required" => "Le champ du nom du livraison est requis.",
            "newDestinataireName.max" => "Le nom du livraison ne peut pas dépasser :max caractères.",
            "newLivraisonsPhone.max" => "Le téléphone du livraison ne peut pas dépasser :max caractères.",
            "newLivraisonsPhone.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "newLivraisonsAdd.required" => "Le champ adresse du destinataire est requis.",
            "newLivraisonsAdd.max" => "L'adresse du destinataire ne peut pas dépasser :max caractères.",
            "selectedCoursier.required" => "Veuillez sélectionner un coursiers.",
            "selectedColis.required" => "Veuillez sélectionner un colis.",
            "selectedStatut.required" => "Veuillez sélectionner un statut.",
        ]);

        Livraison::create([
            "destinataire" => $validatedData["newDestinataireName"],
            "numerodes" => $validatedData["newLivraisonsPhone"],
            "adresse_livraison" => $validatedData["newLivraisonsAdd"],
            "colis_id" => $validatedData["selectedColis"],
            "coursier_id" => $validatedData["selectedCoursiers"],
            "statut_id" => $validatedData["selectedStatut"],
        ]);

        session()->flash('message', 'Le livraison a été enregistré avec succès!');
        $this->reset('newDestinataireName','newLivraisonsPhone','newLivraisonsAdd','selectedColis','selectedCoursiers','selectedStatut');
    }


    public function updateLivraison(Livraison $livraison)
    {
        $validated = $this->validate([
            "editDestinataireName" =>"required|max:20",
            "editLivraisonsPhone" =>"required|max:10|unique:livraisons,numero_telephone",
            "editLivraisonsAdd" =>"required|max:50|unique:livraisons,adresse_livraison",
            "selectedCoursiers" => "required",
            "selectedColis" => "required",

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
       ]);

        $livraisons = Livraison::findOrFail($livraison->id);
        $livraisons->destinataire = $this->editDestinataireName;
        $livraisons->numerodes = $this->editLivraisonPhone;
        $livraisons->adresse_livraison = $this->editLivraisonAdd;


    }
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

        $selectedLivraison = Coursier::find($editLivraison->coursier_id);

        if ($selectedLivraison) {

            $this->selectedLivraison = $selectedLivraison->id;
        } else {

            $this->selectedLivraison = null;
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

        $this->dispatch("showEditModal", []);
    }

    public function showPropD(Livraison $livraison)
    {
        $this->selectedLivraison= $livraison;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteLivraison()
    {
        if ($this->selectedLivraisons) {
            $this->selectedLivraisons->delete();
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

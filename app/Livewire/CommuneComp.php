<?php

namespace App\Livewire;

use App\Models\Commune;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class CommuneComp extends Component
{



    use WithPagination;

    public $search = "";
    public $newCommuneName = "";
    public $editCommuneName = "";
    public $editCommuneid ="";
    public $selectedCommune;
    // public $communeCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    // public function mount()
    // {
    //    $this->communeCount = Commune::count();

    // }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $communes = Commune::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        // $communeCount = $this->communeCount;

        return view('livewire.commune.index', ['communes' => Commune::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewCommune()
    {
        $validated = $this->validate([
            "newCommuneName" => "required|max:20|unique:communes,nom"], [
            "newCommuneName.required" => "Le champ du nom de la commune est requis.",
            "newCommuneName.max" => "Le nom de la commune ne peut pas dépasser :max caractères.",
            "newCommuneName.unique" => "Ce nom de commune est déjà utilisé.",
        ]);

        Commune::create(["nom" => $validated["newCommuneName"]]);
        session()->flash('message', 'Le nom de la commune a été enregistré avec succès!');
    }



    public function updateCommune(Commune $commune)
    {
        $validated = $this->validate([
            "editCommuneName" => ["required", "max:50", Rule::unique("communes", "nom")->ignore($commune->id)],
        ], [
            "editCommuneName.required" => "Le champ du nom de la commune est requis.",
            "editCommuneName.max" => "Le nom de la commune ne peut pas dépasser :max caractères.",
            "editCommuneName.unique" => "Ce nom de commune est déjà utilisé.",
        ]);

        $communes = Commune::findOrFail($commune->id);
        $communes->nom = $this->editCommuneName;
        $result = $communes->save();
        $communes->nom = "";
    }

    public function showProp(Commune $commune)
    {
        $this->selectedCommune = $commune;
        $this->dispatch("showModal", []);
    }

    public function showPropD(Commune $commune)
    {
        $this->showDeleteModal = true; // Définir la propriété pour afficher le modal


        $commune->delete();
        // dd('Method called');
        // Facultativement, vous pouvez envoyer un événement pour afficher un message de confirmation ou effectuer d'autres actions après la suppression.

        // Fermer la fenêtre modale de suppression après la suppression
        $this->dispatch("closeDeleteModal", []);
    }

    public function showPropC(Commune $commune)
    {
        $this->selectedCommune = $commune->nom;

        $this->dispatch("showReadModal", []);

        // dd('bonjour');
    }



    public function showPropE(Commune $commune)
    {

        $editCommune = $commune;
        $this->editCommuneid = $editCommune ->id;
        $this->editCommuneName = $editCommune ->nom;


        $this->dispatch("showEditModal", [$commune->nom]);
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

    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeDeleteModal", []);
    }

    // public function showDeletePrompt($nom, $id)
    // {
    //     $this->dispatch("showConfirmMessage", ["message" => [
    //         "text" => "Vous êtes sur le point de supprimer '$nom' de la liste des propriétés d'articles. Voulez-vous continuer?",
    //         "title" => "Êtes-vous sûr de continuer?",
    //         "type" => "warning",
    //         "data" => [
    //             "propriete_id" => $id
    //         ]
    //     ]]);
    // }


}

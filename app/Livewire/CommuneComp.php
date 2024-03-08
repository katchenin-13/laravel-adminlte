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
    public $showDeleteModal = false;


    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $communes = Commune::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        return view('livewire.commune.index', ['communes' => Commune::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewCommune()
    {
        $validated = $this->validate([
            "newCommuneName" => "required|max:50|unique:communes,nom"
        ]);
        Commune::create(["nom" => $validated["newCommuneName"]]);

    }



    public function updateCommune(Commune $commune)
    {
        $communes = Commune::findOrFail($commune->id);
        $validated = $this->validate([
            "editCommuneName" => ["required", "max:50", Rule::unique("communes", "nom")->ignore($commune->id)]
        ]);
       $communes->nom = $this->editCommuneName;
       $result = $communes->save();
       $communes->nom ="";

    }

    public function showProp(Commune $commune)
    {
        $this->selectedCommune = $commune;
        $this->dispatch("showModal", []);
    }
    public function showPropD(Commune $commune)
    {
        // Logique de suppression de la commune...
       // $this->showDeleteModal = false;
        $this->dispatch("showDeleteModal",[$commune->nom]); // Fermer la modal après la suppression
    }

    public function showPropE(Commune $commune)
    {
       // dd($commune->nom);

       // $this->selectedCommune = $commune;

            // $this->editCommune= $commune->nom ;
            // $this->resetErrorBag(["editCommuneName"]);
        $editCommune = $commune;
        $this->editCommuneid = $editCommune ->id;
        $this->editCommuneName = $editCommune ->nom;

        //dd($editCommune);

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

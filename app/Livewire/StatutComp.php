<?php

namespace App\Livewire;

use App\Models\Statut;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class StatutComp extends Component
{

    public $search = "";
    public $newStatutName = "";
    public $editStatutName = "";
    public $editStatutid ="";
    public $selectedStatut;
    // public $statutCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $statuts = Statut::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        return view('livewire.statut.index', ['statuts' => Statut::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewStatut()
    {
        $validated = $this->validate([
            "newStatutName" => "required|max:20|unique:statuts,nom"], [
            "newStatutName.required" => "Le champ du nom de la statut est requis.",
            "newStatutName.max" => "Le nom de la statut ne peut pas dépasser :max caractères.",
            "newStatutName.unique" => "Ce nom de statut est déjà utilisé.",
        ]);

        Statut::create(["nom" => $validated["newStatutName"]]);
        session()->flash('message', 'Le nom de la statut a été enregistré avec succès!');
    }



    public function updateStatut(Statut $statut)
    {
        $validated = $this->validate([
            "editStatutName" => ["required", "max:50", Rule::unique("statuts", "nom")->ignore($statut->id)],
        ], [
            "editStatutName.required" => "Le champ du nom de la statut est requis.",
            "editStatutName.max" => "Le nom du statut ne peut pas dépasser :max caractères.",
            "editStatutName.unique" => "Ce nom de statut est déjà utilisé.",
        ]);

        $statuts = Statut::findOrFail($statut->id);
        $statuts->nom = $this->editStatutName;
        $result = $statuts->save();
        $statuts->nom = "";
        session()->flash('message', 'Le nom du statut a été modifié avec succès!');
    }


    public function showProp(Statut $statut)
    {
        $this->selectedStatut = $statut;
        $this->dispatch("showModal", []);
    }

    public function showPropD(Statut $statut)
    {
        $this->selectedStatut = $statut;
        $this->dispatch("showDeleteModal", []);
    }
    
    public function deleteStatut()
    {
        if ($this->selectedStatut) {
            $this->selectedStatut->delete();
            $this->dispatch('statutDeleted');
        }
    }

    public function showPropC(Statut $statut)
    {

        $this->selectedStatut = $statut;

        $this->dispatch("readModal", []);
    }



    public function showPropE(Statut $statut)
    {
       // dd($statut->nom);

       // $this->selectedStatut = $statut;

            // $this->editStatut= $statut->nom ;
            // $this->resetErrorBag(["editStatutName"]);
        $editStatut = $statut;
        $this->editStatutid = $editStatut ->id;
        $this->editStatutName = $editStatut ->nom;

        //dd($editStatut);

        $this->dispatch("showEditModal", [$statut->nom]);
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

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal", []);
    }

    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeDeleteModal", []);
    }

}

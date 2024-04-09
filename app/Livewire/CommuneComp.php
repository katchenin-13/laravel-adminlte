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

        $this->reset('newCommuneName');
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
        session()->flash('message', 'Le nom de la commune a été modifié avec succès!');
    }


    public function showProp(Commune $commune)
    {
        $this->selectedCommune = $commune;
        $this->dispatch("CreateModal", []);
    }

    public function showPropD(Commune $commune)
    {
        $this->selectedCommune = $commune;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteCommune()
    {
        if ($this->selectedCommune) {
            $this->selectedCommune->delete();
            $this->dispatch('communeDeleted');
        }
    }

    // public function showPropC(Commune $commune)
    // {
    //     // Récupérer l'objet de la commune à partir de l'identifiant
    //     // $commune = Commune::findOrFail($communeId);

    //     // Stocker le nom de la commune dans la propriété selectedCommune
    //     $this->selectedCommune = $commune->nom;

    //     // Afficher le modal de lecture
    //     $this->dispatch("ReadModal", []);
    // }

    public function showPropC(Commune $commune)
    {
        $this->selectedCommune = $commune;
        $this->dispatch("ReadModal", []);
    }



    public function showPropE(Commune $commune)
    {

        $editCommune = $commune;
        $this->editCommuneid = $editCommune ->id;
        $this->editCommuneName = $editCommune ->nom;

        //dd($editCommune);

        $this->dispatch("EditModal", [$commune->nom]);
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

    // public function closeDeleteModal()
    // {
    //     $this->resetErrorBag();
    //     $this->dispatch("closeDeleteModal", []);
    // }

}

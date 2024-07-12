<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class CategorieComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newCategorieName = "";
    public $editCategorieName = "";
    public $editCategorieid ="";
    public $selectedCategorie;
    // public $communeCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    // public function mount()
    // {
    //    $this->categorieCount = Categorie::count();

    // }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $categories = Categorie::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        return view('livewire.categorie.index', ['categories' => Categorie::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewCategorie()
    {
        $validated = $this->validate([
            "newCategorieName" => "required|max:20|unique:communes,nom"], [
            "newCategorieName.required" => "Le champ du nom de la catégorie est requis.",
            "newCategorieName.max" => "Le nom de la catégorie ne peut pas dépasser :max caractères.",
            "newCategorieName.unique" => "Ce nom de catégorie est déjà utilisé.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Categorie::create([
            "uuid" => $uuid,
            "nom" => $validated["newCategorieName"]]);
        session()->flash('message', 'Le nom de la catégorie a été enregistré avec succès!');
        $this->reset('newCategorieName');
    }



    public function updateCategorie(Categorie $categorie)
    {
        $validated = $this->validate([
            "editCategorieName" => ["required", "max:50", Rule::unique("categories", "nom")->ignore($categorie->id)],
        ], [
            "editCategorieName.required" => "Le champ du nom de la catégorie est requis.",
            "editCategorieName.max" => "Le nom de la catégorie ne peut pas dépasser :max caractères.",
            "editCategorieName.unique" => "Ce nom de catégorie est déjà utilisé.",
        ]);

        $categories = Categorie::findOrFail($categorie->id);
        $categories->nom = $this->editCategorieName;
        $result = $categories->save();
        $categories->nom = "";
        session()->flash('message', 'Le nom de la catégorie a été modifié avec succès!');
    }


    public function showProp(Categorie $categorie)
    {
        $this->selectedCategorie = $categorie;
        $this->dispatch("showModal", []);
    }




    public function showPropD(Categorie $categorie)
    {
 
    }

    public function deleteCategorie()
    {
        if ($this->selectedCategorie) {
            $this->selectedCategorie->delete();
            $this->dispatch('categorieDeleted');
        }
    }


     public function showPropC(Categorie $categorie)
    {
        $this->selectedCategorie = $categorie;

        $this->dispatch("ReadModal", []);
    }



    public function showPropE(Categorie $categorie)
    {
       // dd($categorie->nom);

       // $this->selectedCategorie = $categorie;

            // $this->editCategorie= $categorie->nom ;
            // $this->resetErrorBag(["editCategorieName"]);
        $editCategorie = $categorie;
        $this->editCategorieid = $editCategorie ->id;
        $this->editCategorieName = $editCategorie ->nom;

        //dd($editCategorie);

        $this->dispatch("showEditModal", [$categorie->nom]);
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

<?php

namespace App\Livewire;

use App\Models\Commune;
use App\Models\Comnune;
use Livewire\Component;
use Livewire\WithPagination;

class CommuneComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $currentpage = PAGELIST;

    public $commune_id, $nom;
    public $openModal = false;


    public function render()
    {
        //  return view('livewire.commune-comp');

        return view('livewire.Commune.index', [
            "communes" => Commune::all(),
            "communes" => Commune::latest()->paginate(3),
        ])->extends('layout.master')
        ->section('content');
    }

    public function toggleShowAddCategorieForm()
    {
        if ($this->isAddCategorie) {
            $this->isAddCategorie = false;
            $this->newCategorieName = "";
            $this->resetErrorBag(["newCategorieName"]);
        } else {
            $this->isAddCategorie = true;
        }
    }

    public function addNewCategorie()
    {
        $validated = $this->validate([
            "newCategorieName" => "required|max:50|unique:categories,titre"
        ]);

        Categorie::create(["titre" => $validated["newCategorieName"]]);

        $this->toggleShowAddCategorieForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article ajouté à jour avec succès!"]);
    }

    public function editCategorie(Categorie $categorie)
    {
        $this->dispatchBrowserEvent("showEditForm", ["categorie" => $categorie]);
    }

    public function updateCategorie(Categorie $categorie, $valueFromJS)
    {
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("categories", "titre")->ignore($categorie->id)]
        ]);

        $categorie->update(["titre" => $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Categorie mis à jour avec succès!"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des catégories. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "categorie_id" => $id
            ]
        ]]);
    }

    public function deleteCategorie($id)
    {
        $sql = "DELETE FROM posts WHERE categorie_id=?";
        DB::delete($sql, array($id));

        Categorie::destroy($id);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Categorie supprimé avec succès!"]);
    }
}

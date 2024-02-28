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

    public function toggleShowAddCommuneForm()
    {
        if ($this->isAddCommune) {
            $this->isAddCommune = false;
            $this->newCommuneName = "";
            $this->resetErrorBag(["newCommuneName"]);
        } else {
            $this->isAddCommune = true;
        }
    }

    public function addNewCommune()
    {
        $validated = $this->validate([
            "newCommuneName" => "required|max:50|unique:categories,titre"
        ]);

        Commune::create(["titre" => $validated["newCommuneName"]]);

        $this->toggleShowAddCommuneForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article ajouté à jour avec succès!"]);
    }

    public function editCommune(Commune $categorie)
    {
        $this->dispatchBrowserEvent("showEditForm", ["categorie" => $categorie]);
    }

    public function updateCommune(Commune $categorie, $valueFromJS)
    {
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("categories", "titre")->ignore($categorie->id)]
        ]);

        $categorie->update(["titre" => $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Commune mis à jour avec succès!"]);
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

    public function deleteCommune($id)
    {
        $sql = "DELETE FROM posts WHERE categorie_id=?";
        DB::delete($sql, array($id));

        Commune::destroy($id);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Commune supprimé avec succès!"]);
    }
}

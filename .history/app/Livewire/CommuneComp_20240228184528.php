<?php

namespace App\Livewire;

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
            "communes" => Comnune::all(),
            "communes" => Comnune::latest()->paginate(3),
        ])->extends('layout.master')
        ->section('content');
    }

   


    public function render()
    {

    }
    public function goToAddCommune()
    {
        $this->currentpage == PAGECREATEFORM;
        return $this->redirect('Commune.create', 200);
    }

    public function goToEditCommune($id)
    {

        //   $this->editCommune = Commune::find($id)->toarray();


        $this->currentpage = PAGEEDITFORM;
    }



    public function addCommune()
    {

        // Vérifier que les informations envoyées par le formulaire sont correctes
        // $validated = $this->validate();

        // //dump($validated);
        // // Ajouter un nouvel utilisateur
        $commune = new Commune;
        // $commune->titre = $this->titre;
        // $commune->contenue = $this->contenue;
        $commune->save();
        // $this->titre ="";
        // $this->contenue ="";

        $this->dispatch("showSuccessMessage", ["message" => "Commune créé avec succès!"]);
    }

    public function updateCommune($id)
    {

        // Vérifier que les informations envoyées par le formulaire sont correctes
        //    $validated = $this->validate();


        //    $i= Commune::find($this->editCommune["id"])->update($validated["editCommune"]);

        $commune = Commune::find($this->editCommune["id"]);
        $commune->titre = $this->titre;
        $commune->contenue = $this->contenue;
        $commune->update();
        // $this->titre ="";
        // $this->contenue ="";
        // $this->editCommune = [];

        $this->dispatch("showSuccessMessage", ["message" => "Commune mis à jour avec succès!"]);
    }



    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "article_id" => $id
            ]
        ]]);
    }

    public function deleteUser($id)
    {
        Commune::destroy($id);

        $this->dispatch("showSuccessMessage", ["message" => "Commune supprimé avec succès!"]);
    }

    private function resetInputFields()
    {
        $this->commune_id = '';
        $this->nom = '';
    }

    public function store()
    {
        $this->validate([
            'nom' => 'required',
        ]);

        Commune::create([
            'nom' => $this->nom,
        ]);

        session()->flash('message', 'Commune créée avec succès.');

        $this->nom = '';
        $this->openModal = false;
    }

    public function edit($id)
    {
        $commune = Commune::findOrFail($id);
        $this->commune_id = $id;
        $this->nom = $commune->nom;

        $this->openModal();
    }

    public function delete($id)
    {
        $this->commune_id = $id;
        $this->openModal();
    }
}

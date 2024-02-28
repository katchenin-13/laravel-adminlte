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
    public $isAddCommune = false;
    public $newCommuneName = "";
    public $newPropModel = [];
    public $editPropModel = [];
    public $newValue = "";
    public $selectedCommune;

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $data = [
            "comnunes" => Commune::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            //"proprietesTypeArticles" => ProprieteArticle::where("type_article_id", optional($this->selectedTypeArticle)->id)->get()
        ];
        return view('livewire.commune.index', $data)
        ->extends("layouts.app")
        ->section("content");
    }

    public function toggleShowAddTypeArticleForm()
    {
        if ($this->isAddCommune) {
            $this->isAddCommune = false;
            $this->newCommuneName = "";
            $this->resetErrorBag(["newTypeArticleName"]);
        } else {
            $this->isAddCommune = true;
        }
    }

    public function addNewCommune()
    {
        $validated = $this->validate([
            "newTypeArticleName" => "required|max:50|unique:type_articles,nom"
        ]);

        Commune::create(["nom" => $validated["newCommuneName"]]);

        $this->toggleShowAddCommuneForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article ajouté à jour avec succès!"]);
    }

    public function editCommune(Commune $commune)
    {
        $this->dispatchBrowserEvent("showEditForm", ["Commune" => $commune]);
    }

    public function updateTypeArticle(Commune $commune, $valueFromJS)
    {
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("type_articles", "nom")->ignore($commune->id)]
        ]);

        $Commune->update(["nom" => $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article mis à jour avec succès!"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des types d'articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "type_article_id" => $id
            ]
        ]]);
    }

    public function deleteTypeArticle(Commune $commune)
    {
        $commune->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article supprimé avec succès!"]);
    }

    public function showProp(Commune $commune)
    {

        $this->selectedCommune = $commune;

        $this->dispatchBrowserEvent("showModal", []);
    }

    public function addProp()
    {
        $validated = $this->validate([
            "newPropModel.nom" => [
                "required",
                Rule::unique("propriete_articles", "nom")->where("type_article_id", $this->selectedCommune->id)
            ],
            "newPropModel.estObligatoire" => "required"
        ]);

        // ProprieteArticle::create([
        //     "nom" => $this->newPropModel["nom"],
        //     "estObligatoire" => $this->newPropModel["estObligatoire"],
        //     "type_article_id" => $this->selectedTypeArticle->id,
        // ]);

        $this->newPropModel = [];
        $this->resetErrorBag();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété ajoutée avec succès!"]);
    }

    function showDeletePrompt($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer '$name' de la liste des propriétés d'articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "propriete_id" => $id
            ]
        ]]);
    }

    // public function deleteProp(ProprieteArticle $proprieteArticle)
    // {

    //     $proprieteArticle->delete();
    //     $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété supprimée avec succès!"]);
    // }

    // public function editProp(ProprieteArticle $proprieteArticle)
    // {

    //     $this->editPropModel["nom"] = $proprieteArticle->nom;
    //     $this->editPropModel["estObligatoire"] = $proprieteArticle->estObligatoire;
    //     $this->editPropModel["id"] = $proprieteArticle->id;

    //     $this->dispatchBrowserEvent("showEditModal", []);
    // }

    // public function updateProp()
    // {
    //     $this->validate([
    //         "editPropModel.nom" => [
    //             "required",
    //             Rule::unique("propriete_articles", "nom")->ignore($this->editPropModel["id"])
    //         ],
    //         "editPropModel.estObligatoire" => "required"
    //     ]);

    //     ProprieteArticle::find($this->editPropModel["id"])->update([
    //         "nom" => $this->editPropModel["nom"],
    //         "estObligatoire" => $this->editPropModel["estObligatoire"]
    //     ]);

    //     $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Propriété mise à jour avec succès!"]);
    //     $this->closeEditModal();
    // }

    public function closeModal()
    {
        $this->dispatchBrowserEvent("closeModal", []);
    }

    public function closeEditModal()
    {
        $this->editPropModel = [];
        $this->resetErrorBag();
        $this->dispatchBrowserEvent("closeEditModal", []);
    }

}

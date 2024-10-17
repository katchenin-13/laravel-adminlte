<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
use App\Models\Statut;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class StatutComp extends Component
{

    public $search = "";
    public $statut;
    public $newStatutName = "";
    public $editStatutName = "";
    public $editStatutid ="";
    public $selectedStatut;
    public $statutType = '';
    public $editstatutType = '';
    // public $statutCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $statut = Statut::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('uuid', 'like', '%'.$this->search.'%')
        ->paginate(10);

        return view('livewire.statut.index', [
            'statuts' => $statut,
            ])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewStatut()
    {
      $validated = $this->validate([
        "newStatutName" => "required|max:20|unique:statuts,nom",
        "statutType" => "required|in:paiement,livraison", // Validation pour le type de statut
    ], [
        "newStatutName.required" => "Le champ du nom de la statut est requis.",
        "newStatutName.max" => "Le nom de la statut ne peut pas dépasser :max caractères.",
        "newStatutName.unique" => "Ce nom de statut est déjà utilisé.",
        "statutType.required" => "Le type de statut est requis.",
        "statutType.in" => "Le type de statut doit être soit 'paiement' soit 'livraison'.",
    ]);

    $uuid = Uuid::uuid4()->toString();
    Statut::create([
        "uuid" => $uuid,
        "nom" => $validated["newStatutName"],
        "statut_type" => $validated["statutType"], // Ajouter le type de statut
    ]);


            session()->flash('message', 'Le nom de la statut a été enregistré avec succès!');
            $this->reset('newStatutName', 'statutType');
        }

    public function updateStatut(Statut $statut)
    {
   $validated = $this->validate([
        "editStatutName" => ["required", "max:50", Rule::unique("statuts", "nom")->ignore($statut->id)],
        "editstatutType" => "required|in:paiement,livraison",
    ], [
        "editStatutName.required" => "Le champ du nom de la statut est requis.",
        "editStatutName.max" => "Le nom du statut ne peut pas dépasser :max caractères.",
        "editStatutName.unique" => "Ce nom de statut est déjà utilisé.",
        "editstatutType.required" => "Le type de statut est requis.",
        "editstatutType.in" => "Le type de statut doit être soit 'paiement' soit 'livraison'.",
    ]);
    $statut->update([
    'nom' =>$this->editStatutName,
     'statut_type' => $this->editstatutType,
    ]);

    session()->flash('message', 'Le statut a été modifié avec succès!');
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
        $this->editstatutType = $editStatut ->statut_type;
        //dd($editStatut);

        $this->dispatch("showEditModal", [$statut->nom,$statut->statut_type]);
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

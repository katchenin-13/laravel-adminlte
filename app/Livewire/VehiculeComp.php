<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Vehicule;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class VehiculeComp extends Component
{
    public $search = "";
    public $newVehiculeName = "";
    public $editVehiculeName = "";
    public $editVehiculeid ="";
    public $selectedVehicule;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $vehicules = Vehicule::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('numero_telephone', 'like', '%'.$this->search.'%')
        ->paginate(10);

        return view('livewire.vehicule.index', ['vehicules' => Vehicule::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewVehicule()
    {
        $validated = $this->validate([
            "newVehiculeName" => "required|max:20|unique:vehicules,nom"], [
            "newVehiculeName.required" => "Le champ nom du type de vehicule est requis.",
            "newVehiculeName.max" => "Le nom du type de vehicule ne peut pas dépasser :max caractères.",
            "newVehiculeName.unique" => "Ce nom du type de vehicule est déjà utilisé.",
        ]);

        $uuid = Uuid::uuid4()->toString();
        Vehicule::create(["uuid" => $uuid,
            "nom" => $validated["newVehiculeName"]]);
        session()->flash('message', 'Le nom du type de vehicule a été enregistré avec succès!');
        $this->reset('newVehiculeName');
    }



    public function updateVehicule(Vehicule $vehicule)
    {
        $validated = $this->validate([
            "editVehiculeName" => ["required", "max:50", Rule::unique("vehicules", "nom")->ignore($vehicule->id)],
        ], [
            "editVehiculeName.required" => "Le champ du nom du type de vehicule est requis.",
            "editVehiculeName.max" => "Le nom du type de vehicule ne peut pas dépasser :max caractères.",
            "editVehiculeName.unique" => "Ce nom du type de vehicule est déjà utilisé.",
        ]);

        $vehicules = Vehicule::findOrFail($vehicule->id);
        $vehicules->nom = $this->editVehiculeName;
        $result = $vehicules->save();
        $vehicules->nom = "";
        session()->flash('message', 'Le nom du type de vehicule a été modifié avec succès!');
    }


    public function showProp(Vehicule $vehicule)
    {
        $this->selectedVehicule = $vehicule;
        $this->dispatch("showModal", []);
    }

    public function showPropD(Vehicule $vehicule)
    {
        $this->selectedVehicule = $vehicule;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteVehicule()
    {
        if ($this->selectedVehicule) {
            $this->selectedVehicule->delete();
            $this->dispatch('vehiculeDeleted');
        }
    }

    public function showPropC(Vehicule $vehicule)
    {
        $this->selectedVehicule = $vehicule;
        $this->dispatch("readModal", []);
    }



    public function showPropE(Vehicule $vehicule)
    {
       // dd($vehicule->nom);

       // $this->selectedVehicule = $vehicule;

            // $this->editVehicule= $vehicule->nom ;
            // $this->resetErrorBag(["editVehiculeName"]);
        $editVehicule = $vehicule;
        $this->editVehiculeid = $editVehicule ->id;
        $this->editVehiculeName = $editVehicule ->nom;

        //dd($editVehicule);

        $this->dispatch("showEditModal", [$vehicule->nom]);
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

<?php

namespace App\Livewire;

use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ZoneComp extends Component
{


    use WithPagination;

    public $search = "";
    public $newZoneName = "";
    public $editZoneName = "";
    public $editZoneid ="";
    public $selectedZone;
    // public $communeCount;
    public $showDeleteModal="false";
//    public $counter = 0;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        // $total = $Commune ::total();

        $zones = Zone::where("nom", "like", $searchCriteria)->latest()->paginate(5);

        return view('livewire.zone.index', compact('zones'))
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewZone()
    {
        $validated = $this->validate([
            "newZoneName" => "required|max:20|unique:zones,nom"], [
            "newZoneName.required" => "Le champ du nom de la zone est requis.",
            "newZoneName.max" => "Le nom de la zone ne peut pas dépasser :max caractères.",
            "newZoneName.unique" => "Ce nom de zone est déjà utilisé.",
        ]);

        Zone::create(["nom" => $validated["newZoneName"]]);
        session()->flash('message', 'Le nom de la zone a été enregistré avec succès!');
    }



    public function updateZone(zone $zone)
    {
        $validated = $this->validate([
            "editZoneName" => ["required", "max:50", Rule::unique("zones", "nom")->ignore($zone->id)],
        ], [
            "editZoneName.required" => "Le champ du nom de la zone est requis.",
            "editZoneName.max" => "Le nom de la zone ne peut pas dépasser :max caractères.",
            "editZoneName.unique" => "Ce nom de zone est déjà utilisé.",
        ]);

        $zones = Zone::findOrFail($zone->id);
        $zones->nom = $this->editZoneName;
        $result = $zones->save();
        $zones->nom = "";
    }

    public function showProp(Zone $zone)
    {
        $this->selectedZone = $zone;
        $this->dispatch("showModal", []);
    }

    public function showPropD(Zone $zone)
    {
        $this->showDeleteModal = true; // Définir la propriété pour afficher le modal


        $zone->delete();
        // dd('Method called');
        // Facultativement, vous pouvez envoyer un événement pour afficher un message de confirmation ou effectuer d'autres actions après la suppression.

        // Fermer la fenêtre modale de suppression après la suppression
        $this->dispatch("closeDeleteModal", []);
    }

    public function showPropC(Zone $zone)
    {
        $this->selectedZone = $zone->nom;

        $this->dispatch("showReadModal", []);

        // dd('bonjour');
    }



    public function showPropE(Zone $zone)
    {
       // dd($zone->nom);

       // $this->selectedZone = $Zone;

            // $this->editZone= $Zone->nom ;
            // $this->resetErrorBag(["editZoneName"]);
        $editZone = $Zone;
        $this->editZoneid = $editZone ->id;
        $this->editZoneName = $editZone ->nom;

        //dd($editZone);

        $this->dispatch("showEditModal", [$zone->nom]);
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


}

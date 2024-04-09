<?php

namespace App\Livewire;

use App\Models\Zone;
use App\Models\Commune;
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
    public $selectedCommune ="";
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

        $communes = Commune::all();
        return view('livewire.zone.index', compact('zones','communes'))
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewZone()
    {
        $validatedData = $this->validate([
            "newZoneName" => "required|max:20|unique:zones,nom",
            "selectedCommune" => "required", // Assurez-vous que la commune est sélectionnée
        ], [
            "newZoneName.required" => "Le champ du nom de la zone est requis.",
            "newZoneName.max" => "Le nom de la zone ne peut pas dépasser :max caractères.",
            "newZoneName.unique" => "Ce nom de zone est déjà utilisé.",
            "selectedCommune.required" => "Veuillez sélectionner une commune.",
        ]);

        // Créer une nouvelle zone avec la commune sélectionnée
        Zone::create([
            "nom" => $validatedData["newZoneName"],
            "commune_id" => $validatedData["selectedCommune"],
        ]);

        session()->flash('message', 'Le nom de la zone a été enregistré avec succès!');
        $this->reset('newZoneName','selectedCommune');
    }



    public function updateZone(Zone $zone)
    {
        $validated = $this->validate([
            "editZoneName" => ["required", "max:50", Rule::unique("zones", "nom")->ignore($zone->id)],
        ], [
            "editZoneName.required" => "Le champ du nom de la zone est requis.",
            "editZoneName.max" => "Le nom de la zone ne peut pas dépasser :max caractères.",
            "editZoneName.unique" => "Ce nom de zone est déjà utilisé.",
        ]);

        $editZone = Zone::findOrFail($zone->id);
        $editZone->nom = $this->editZoneName;
        $editZone->save();
        $this->editZoneName = "";
        session()->flash('message', 'mise à jour avec succès!');
    }

    public function updateCommune($zoneId, $communeId)
    {
        $zone = Zone::findOrFail($zoneId);
        $zone->commune_id = $communeId;
        $zone->save();


    }


    public function showProp(Zone $zone)
    {
        $this->selectedZone = $zone;
        $this->dispatch("showModal", []);
    }

    public function showPropD(Zone $zone)
    {
        $this->selectedZone = $zone;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteZone()
    {
        if ($this->selectedZone) {
            $this->selectedZone->delete();
            $this->dispatch('ZoneDeleted');
        }
    }

    public function showPropC(Zone $zone)
    {
        $this->selectedZone = $zone;

        $this->dispatch("ReadModal", []);

        // dd('bonjour');
    }



    public function showPropE(Zone $zone)
    {
        $editZone = $zone;
        $this->editZoneid = $editZone->id;
        $this->editZoneName = $editZone->nom;

        // Récupérer la commune sélectionnée en fonction de l'ID de la commune associée à la zone
        $selectedCommune = Commune::find($editZone->commune_id);

        if ($selectedCommune) {
            // Si la commune est trouvée, définissez-la comme commune sélectionnée
            $this->selectedCommune = $selectedCommune->id;
        } else {
            // Si la commune n'est pas trouvée, définissez la commune sélectionnée sur null ou une valeur par défaut
            $this->selectedCommune = null; // ou toute autre valeur par défaut
        }

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

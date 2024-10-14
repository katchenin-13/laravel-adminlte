<?php

namespace App\Livewire;

use App\Models\Zone;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Coursier;
use App\Models\Employer;
use App\Models\Vehicule;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class CoursierComp extends Component
{
    use WithPagination;


    public $search = "";
    public $coursier;
    public $newCoursiersName = "";
    public $newCoursiersPrenom = "";
    public $newCoursiersPhone = "";
    public $newCoursiersNump = "";
    public $newCoursiersPlaq = "";
    public $newCoursiersCni = "";
    public $newCoursiersEmail = "";
    public $editCoursiersName = "";
    public $editCoursierPrenom = "";
    public $editCoursiersPhone1 = "";
    public $editCoursiersNump = "";
    public $editCoursiersPlaq = "";
    public $editCoursiersCni = "";
    public $editCoursiersEmail = "";
    public $editCoursiersId = "";
    public $selectedCoursiers;
    public $selectedZone;
    public $selectedVehicule;
    public $selectedEmployer;
    public $coursierCount;
    public $showDeleteModal = false;

    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->coursierCount = Coursier::count();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $coursiers = Coursier::where('nom', 'like', $searchCriteria)
            ->orWhere('email', 'like', $searchCriteria)
            ->orWhere('numero_telephone', 'like', $searchCriteria)
            ->orWhere('cni', 'like', $searchCriteria)
            ->orWhere('plaque_immatriculation', 'like', $searchCriteria)
            ->orWhere('uuid', 'like', $searchCriteria)
            ->paginate(10);

        $zones = Zone::all();
        $employers = Employer::all();
        $vehicules = Vehicule::all();

        return view('livewire.coursier.index', [
            'coursiers' => $coursiers,
            'zones' => $zones,
            'employers' => $employers,
            'vehicules' => $vehicules,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewCoursier()
    {
        $validatedData = $this->validate([
            "newCoursiersName" => "required|max:20",
            "newCoursiersPrenom" => "required|max:50",
            "newCoursiersPhone" => "required|max:10|regex:/^[0-9]+$/|unique:coursiers,numero_telephone",
            "newCoursiersNump" => "required|max:20|unique:coursiers,numero_permis_conduire",
            "newCoursiersCni" => "required|max:9|unique:coursiers,cni",
            "newCoursiersPlaq" => "required|max:20",
            "newCoursiersEmail" => "required|max:50|unique:coursiers,email",
            "selectedVehicule" => "required",
            "selectedZone" => "required",
            "selectedEmployer" => "required",
        ], [
            "newCoursiersName.required" => "Le champ du nom du coursier est requis.",
            "newCoursiersName.max" => "Le nom du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPrenom.required" => "Le champ du prénom du coursier est requis.",
            "newCoursiersPrenom.max" => "Le prénom du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPhone.required" => "Le champ du téléphone du coursier est requis.",
            "newCoursiersPhone.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPhone.regex" => "Le champ du téléphone ne peut contenir que des chiffres.",
            "newCoursiersNump.required" => "Le champ du numéro de permis du coursier est requis.",
            "newCoursiersNump.max" => "Le numéro de permis du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersNump.unique" => "Le numéro de permis est déjà utilisé.",
            "newCoursiersCni.required" => "Le champ CNI du coursier est requis.",
            "newCoursiersCni.max" => "Le CNI du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersCni.unique" => "CNI existe déjà.",
            "newCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
            "newCoursiersPlaq.max" => "La plaque du véhicule ne peut pas dépasser :max caractères.",
            "selectedZone.required" => "Veuillez sélectionner une zone.",
            "selectedVehicule.required" => "Veuillez sélectionner un véhicule.",
            "selectedEmployer.required" => "Veuillez sélectionner le type d'employé.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Coursier::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newCoursiersName"],
            "prenom" => $validatedData["newCoursiersPrenom"],
            "numero_telephone" => $validatedData["newCoursiersPhone"],
            "numero_permis_conduire" => $validatedData["newCoursiersNump"],
            "plaque_immatriculation" => $validatedData["newCoursiersPlaq"],
            "cni" => $validatedData["newCoursiersCni"],
            "email" => $validatedData["newCoursiersEmail"],
            "vehicule_id" => $validatedData["selectedVehicule"],
            "zone_id" => $validatedData["selectedZone"],
            "employer_id" => $validatedData["selectedEmployer"],
        ]);

        session()->flash('message', 'Le coursier a été enregistré avec succès!');
        $this->reset('newCoursiersCni', 'selectedVehicule', 'selectedZone', 'newCoursiersEmail', 'newCoursiersName', 'newCoursiersPrenom', 'newCoursiersPhone', 'newCoursiersNump', 'selectedEmployer', 'newCoursiersPlaq');
    }



    public function showProp(Coursier $coursier)
    {
        $this->selectedCoursiers = $coursier;
        $this->dispatch("ModalCreate", []);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }

    public function updateCoursier(Coursier $coursier)
    {
        $validated = $this->validate([
            "editCoursiersName" => "required|max:20",
            "editCoursierPrenom" => "required|max:50",
            "editCoursiersPhone1" => "required|max:10|regex:/^[0-9]+$/|unique:coursiers,numero_telephone," . $coursier->id,
            "editCoursiersNump" => "required|max:20|unique:coursiers,numero_permis_conduire," . $coursier->id,
            "editCoursiersCni" => "required|max:9|unique:coursiers,cni," . $coursier->id,
            "editCoursiersEmail" => "required|max:50|unique:coursiers,email," . $coursier->id,
            "editCoursiersPlaq" => "required|max:20",
            "selectedZone" => "required",
            "selectedVehicule" => "required",
            "selectedEmployer" => "required",
        ], [
            "editCoursiersName.required" => "Le champ du nom du coursier est requis.",
            "editCoursiersName.max" => "Le nom du coursier ne peut pas dépasser :max caractères.",
            "editCoursierPrenom.required" => "Le champ du prénom du coursier est requis.",
            "editCoursierPrenom.max" => "Le prénom du coursier ne peut pas dépasser :max caractères.",
            "editCoursiersPhone1.required" => "Le champ du téléphone du coursier est requis.",
            "editCoursiersPhone1.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
            "editCoursiersPhone1.regex" => "Le champ du téléphone ne peut contenir que des chiffres.",
            "editCoursiersNump.required" => "Le champ du numéro de permis du coursier est requis.",
            "editCoursiersNump.max" => "Le numéro de permis du coursier ne peut pas dépasser :max caractères.",
            "editCoursiersCni.required" => "Le champ CNI du coursier est requis.",
            "editCoursiersCni.max" => "Le CNI du coursier ne peut pas dépasser :max caractères.",
            "editCoursiersEmail.required" => "Le champ email du coursier est requis.",
            "editCoursiersEmail.max" => "L'email du coursier ne peut pas dépasser :max caractères.",
            "editCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
            "editCoursiersPlaq.max" => "La plaque du véhicule ne peut pas dépasser :max caractères.",
            "selectedZone.required" => "Veuillez sélectionner une zone.",
            "selectedEmployer.required" => "Veuillez sélectionner le type d'employé.",
            "selectedVehicule.required" => "Veuillez sélectionner un véhicule.",
        ]);

        $coursier->update([
            'nom' => $this->editCoursiersName,
            'prenom' => $this->editCoursierPrenom,
            'numero_telephone' => $this->editCoursiersPhone1,
            'numero_permis_conduire' => $this->editCoursiersNump,
            'plaque_immatriculation' => $this->editCoursiersPlaq,
            'cni' => $this->editCoursiersCni,
            'email' => $this->editCoursiersEmail,
            'zone_id' => $this->selectedZone,
            'vehicule_id' => $this->selectedVehicule,
            'employer_id' => $this->selectedEmployer,
        ]);

        session()->flash('message', 'Le coursier a été mis à jour avec succès!');
    }

    public function updateZone($coursierId, $zoneId)
    {
        $coursier = Coursier::findOrFail($coursierId);
        $coursier->zone_id = $zoneId;
        $coursier->save();

    }

    public function updateVehicule($coursierId, $vehiculeId)
    {
        $coursier = Coursier::findOrFail($coursierId);
        $coursier->vehicule_id = $vehiculeId;
        $coursier->save();

    }

    public function updateEmployer($coursierId, $employerId)
    {
        $coursier = Coursier::findOrFail($coursierId);
        $coursier->employer_id = $employerId;
        $coursier->save();

    }

    public function showPropC(Coursier $coursier)
    {
        $this->selectedCoursiers = $coursier;

        $this->dispatch("readModal", []);
    }

    public function closeReadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeReadModal", []);
    }


    public function showPropE(Coursier $coursier)
    {
        $this->editCoursiersId = $coursier->id;
        $this->editCoursiersName = $coursier->nom;
        $this->editCoursierPrenom = $coursier->prenom;
        $this->editCoursiersPhone1 = $coursier->numero_telephone;
        $this->editCoursiersNump = $coursier->numero_permis_conduire;
        $this->editCoursiersPlaq = $coursier->plaque_immatriculation;
        $this->editCoursiersCni = $coursier->cni;
        $this->editCoursiersEmail = $coursier->email;

        $this->selectedZone = $coursier->zone_id;
        $this->selectedVehicule = $coursier->vehicule_id;
        $this->selectedEmployer = $coursier->employer_id;

        $this->dispatch("showEditModal", [$coursier->nom, $coursier->prenom, $coursier->numero_telephone, $coursier->numero_permis_conduire, $coursier->email, $coursier->cni, $coursier->plaque_immatriculation]);
    }

    public function showPropD(Coursier $coursier)
    {
        $this->selectedCoursiers = $coursier;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteCoursier()
    {
        if ($this->selectedCoursiers) {
            $this->selectedCoursiers->delete();
            $this->dispatch('coursierDeleted');
        }
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

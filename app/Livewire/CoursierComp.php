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
    public $editCoursiersPrenom = "";
    public $editCoursiersPhone1 = "";
    public $editCoursiersNump = "";
    public $editCoursiersPlaq = "";
    public $editCoursiersCni = "";
    public $editCoursiersEmail = "";
    public $editCoursiersid ="";
    public $selectedCoursiers;
    public $selectedZone;
    public $selectedVehicule;
    public $selectedEmployer;
    public $coursierCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->coursierCount = Coursier::count();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $coursier = Coursier::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('numero_telephone', 'like', '%'.$this->search.'%')
        ->orWhere('cni', 'like', '%'.$this->search.'%')
        ->orWhere('plaque_immatriculation', 'like', '%'.$this->search.'%')
        ->orWhere('uuid', 'like', '%'.$this->search.'%')
        ->paginate(10);
        // dd("all");
        $zones = Zone::all();
        $employers = Employer::all();
        $vehicules = Vehicule::all();

        return view('livewire.coursier.index', [
            'coursiers'=> $coursier,
            'zones'=> $zones,
            'employers'=>$employers,
            'vehicules'=> $vehicules,
            ])
                ->extends("layouts.app")
                ->section("content");
    }

    public function addNewCoursier()
    {
        $validatedData = $this->validate([
            "newCoursiersName" => "required|max:20",
            "newCoursiersPrenom" => "required|max:50",
            "newCoursiersPhone" => "required|max:10|regex:/^[0-9]{10}$/|unique:coursiers,numero_telephone",
            "newCoursiersNump" => "required|max:20|unique:coursiers,numero_permis_conduire",
            "newCoursiersCni" => "required|max:11|unique:coursiers,cni",
            "newCoursiersPlaq" => "required|max:7",
            'newCoursiersEmail' => 'required|email|max:50|unique:coursiers,email',
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
            "newCoursiersCni.unique" => "Le CNI existe déjà.",
            "newCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
            "newCoursiersPlaq.max" => "La plaque du véhicule ne peut pas dépasser :max caractères.",
            "newCoursiersEmail.required" => "Le champ email du coursier est requis.",
            "newCoursiersEmail.max" => "L'email du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersEmail.unique" => "L'email est déjà utilisé.",
            "newCoursiersEmail.email" => "Veuillez entrer une adresse email valide.",
            "selectedZone.required" => "Veuillez sélectionner une zone.",
            "selectedVehicule.required" => "Veuillez sélectionner un véhicule.",
            "selectedEmployer.required" => "Veuillez sélectionner le type d'employeur.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Coursier::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newCoursiersName"],
            "prenom" => $validatedData["newCoursiersPrenom"],
            "numero_telephone" => $validatedData["newCoursiersPhone"],
            "numero_numero_permis_conduire" => $validatedData["newCoursiersNump"],
            "plaque_immatriculation" => $validatedData["newCoursiersPlaq"],
            "cni" => $validatedData["newCoursiersCni"],
            "email" => $validatedData["newCoursiersEmail"],
            "vehicule_id" => $validatedData["selectedVehicule"],
            "zone_id" => $validatedData["selectedZone"],
            "employer_id" => $validatedData["selectedEmployer"],
        ]);
        session()->flash('message', 'Le coursier a été enregistré avec succès!');
        $this->reset('newCoursiersCni','selectedVehicule','selectedZone','newCoursiersEmail','newCoursiersName','newCoursiersPrenom','newCoursiersPhone','newCoursiersNump','selectedEmployer','newCoursiersPlaq');
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
            "editCoursiersPrenom" => "required|max:50",
            "editCoursiersPhone1" => "required|max:10|regex:/^[0-9]{10}$/|unique:coursiers,numero_telephone," . $coursier->id,
            "editCoursiersNump" => "required|max:20|unique:coursiers,numero_permis_conduire," . $coursier->id,
            "editCoursiersCni" => "required|max:11|unique:coursiers,cni," . $coursier->id,
            "editCoursiersEmail" => "required|email|max:50|unique:coursiers,email," . $coursier->id,
            "editCoursiersPlaq" => "required|max:7",
            "selectedZone" => "required",
            "selectedVehicule" => "required",
            "selectedEmployer" => "required",

       ], [
        "editCoursiersName.required" => "Le champ du nom du coursier est requis.",
        "editCoursiersName.max" => "Le nom du coursier ne peut pas dépasser :max caractères.",
        "editCoursiersPrenom.required" => "Le champ du prénom du coursier est requis.",
        "editCoursiersPrenom.max" => "Le prénom du coursier ne peut pas dépasser :max caractères.",
        'editCoursiersPhone1.required' => "Le champ du téléphone du coursier est requis.",
        'editCoursiersPhone1.max' => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
        'editCoursiersPhone1.regex' => "Le champ du téléphone ne peut contenir que des chiffres.",
        'editCoursiersPhone1.unique' => "Ce numéro de téléphone est déjà utilisé.",
        "editCoursiersNump.required" => "Le champ du numéro de permis du coursier est requis.",
        "editCoursiersNump.max" => "Le numéro de permis du coursier ne peut pas dépasser :max caractères.",
        "editCoursiersNump.unique" => "Le numéro de permis est déjà utilisé.",
        "editCoursiersCni.required" => "Le champ CNI du coursier est requis.",
        "editCoursiersCni.max" => "La CNI du coursier ne peut pas dépasser :max caractères.",
        "editCoursiersCni.unique" => "Le CNI existe déjà.",
        "editCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
        "editCoursiersPlaq.max" => "La plaque du véhicule ne peut pas dépasser :max caractères.",
        "editCoursiersEmail.required" => "Le champ email du coursier est requis.",
        "editCoursiersEmail.max" => "L'email du coursier ne peut pas dépasser :max caractères.",
        "editCoursiersEmail.unique" => "L'email est déjà utilisé.",
        "editCoursiersEmail.email" => "Veuillez entrer une adresse email valide.",
        "selectedZone.required" => "Veuillez sélectionner une zone.",
        "selectedEmployer.required" => "Veuillez sélectionner le type d'employeur.",
        "selectedVehicule.required" => "Veuillez sélectionner un véhicule.",
       ]);

        $coursiers = Coursier::findOrFail($coursier->id);
        $coursiers->nom = $this->editCoursiersName;
        $coursiers->prenom = $this->editCoursierPrenom;
        $coursiers->numero_telephone = $this->editCoursierPhone1;
        $coursiers->numero_permis_conduire = $this->editCoursiersNump;
        $coursiers->plaque_immatriculation = $this->editCoursierPlaq;
        $coursiers->cni = $this->editCoursierCni;
        $coursiers->email= $this->editCoursierEmail;
        $result = $coursiers->save();
        $coursiers->nom = "";
        $coursiers->prenom = "";
        $coursiers->numero_telephone = "";
        $coursiers->numero_permis_conduire = "";
        $coursiers->plaque_immatriculation = "";
        $coursiers->salaire = "";
        $coursiers->cni = "";
        $coursiers->email = "";

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

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal", []);
    }


    public function showPropE(Coursier $coursier)
    {
        $editCoursier = $coursier;
        $this->editCoursiersid = $editCoursier->id;
        $this->editCoursiersName= $editCoursier->nom;
        $this->editCoursiersPrenom = $editCoursier->prenom;
        $this->editCoursiersPhone1 = $editCoursier->numero_telephone;
        $this->editCoursiersNump = $editCoursier->numero_permis_conduire;
        $this->editCoursiersPlaq= $editCoursier->plaque_immatriculation;
        $this->editCoursiersCni= $editCoursier->cni;
        $this->editCoursiersEmail = $editCoursier->email;

        function getModelId($model, $id) {
            $instance = $model::find($id);
            return $instance ? $instance->id : null;
        }

        $this->selectedZone = getModelId(Zone::class, $editCoursier->zone_id);
        $this->selectedVehicule = getModelId(Vehicule::class, $editCoursier->vehicule_id);
        $this->selectedEmployer = getModelId(Employer::class, $editCoursier->employer_id);

        $this->dispatch("showEditModal", [$coursier->nom,$coursier->prenom,$coursier->numero_telephone,$coursier->numero_telephone_2,$coursier->numero_permis_conduire,$coursier->email,$coursier->cni,$coursier->photo,$coursier->numero_plaque_immatriculation,$coursier->numero_salaire]);
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

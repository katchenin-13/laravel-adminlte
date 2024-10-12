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
             "newCoursiersName" =>"required|max:20",
             "newCoursiersPrenom" =>"required|max:50",
             "newCoursiersPhone"=>"required|max:10|unique|regex:/^[0-9]+$/:coursiers,numero_telephone",
             "newCoursiersNump" =>"required|max:20|unique:coursiers,numero_permis_conduire",
             "newCoursiersCni" =>"required|max:9|unique:coursiers,cni",
             "newCoursiersPlaq" =>"required|max:20",
             "newCoursiersEmail" =>"required|max:50|unique:coursiers,email",
             "selectedVehicule" => "required",
             "selectedZone" => "required",
             "selectedEmployer" => "required",
        ], [
            "newCoursiersName.required" => "Le champ du nom du coursier est requis.",
            "newCoursiersName.max" => "Le nom du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPrenom.required" => "Le champ du prenom du coursier est requis.",
            "newCoursiersPrenom.max" => "Le prenom du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPhone.required" => "Le champ du téléphone du coursier est requis.",
            "newCoursiersPhone.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPhone.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "newCoursiersPhone2.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersPhone2.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "newCoursiersNump.required" => "Le champ du numero de permis du coursier est requis.",
            "newCoursiersNump.max" => "Le numero de permis du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersNump.unique" => "numero de permis est déjà utilisé.",
            "newCoursiersSal.max" => "Le salaire du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersSal.regex" => "Le champ du salaire peut contenir que des chiffres.",
            "newCoursiersEmail.required" => "Le champ email du coursier est requis.",
            "newCoursiersEmail.max" => "L'email du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersEmail.unique" => "Email est déjà utilisé.",
            "newCoursiersCni.required" => "Le champ cni du coursier est requis.",
            "newCoursiersCni.max" => "La cni du coursier ne peut pas dépasser :max caractères.",
            "newCoursiersCni.unique" => "Cni existe déjà.",
            "newCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
            "newCoursiersPlaq.max" => "La palque du vehicule ne peut pas dépasser :max caractères.",
            "selectedZone.required" => "Veuillez sélectionner une zone.",
            "selectedVehicule.required" => "Veuillez sélectionner un vehicule.",
            "selectedEmployer.required" => "Veuillez sélectionner le type d'employer.",
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
            "editCoursiersName" =>"required|max:20",
            "editCoursiersPrenom" =>"required|max:50",
            "editCoursiersPhone1"=>["required","max:10","regex:/^[0-9]+$/",Rule::unique('coursiers')->ignore($coursier->id),],
            "editCoursiersNump" =>["required","max:20",Rule::unique('coursiers')->ignore($coursier->id),],
            "editCoursiersCni" =>["require","max:9",Rule::unique('coursiers')->ignore($coursier->id),],
            "editCoursiersEmail" =>["required","max:50","unique",Rule::unique('coursiers')->ignore($coursier->id),],
            "editCoursiersPlaq" =>"required|max:20",
            "selectedZone" => "required",
            "selectedVehicule" => "required",
            "selectedEmployer" => "required",

       ], [
           "editCoursiersName.required" => "Le champ du nom du coursier est requis.",
           "editCoursiersName.max" => "Le nom du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPrenom.required" => "Le champ du prenom du coursier est requis.",
           "editCoursiersPrenom.max" => "Le prenom du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPhone1.required" => "Le champ du téléphone du coursier est requis.",
           "editCoursiersPhone1.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPhone1.unique" => "numero de téléphone est déjà utilisé.",
           "editCoursiersPhone1.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
           "editCoursiersNump.required" => "Le champ du numero de permis du coursier est requis.",
           "editCoursiersNump.max" => "Le numero de permis du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersNump.unique" => "numero de permis est déjà utilisé.",
           "editCoursiersSal.required" => "Le champ du salaire du coursier est requis.",
           "editCoursiersSal.max" => "Le salaire du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersEmail.required" => "Le champ email du coursier est requis.",
           "editCoursiersEmail.max" => "L'email du coursier ne peut pas dépasser :max caractères.",
           "newCoursiersEmail.unique" => "Email est déjà utilisé.",
           "editCoursiersCni.required" => "Le champ cni du coursier est requis.",
           "editCoursiersCni.max" => "La cni du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersCni.unique" => "Cni existe déjà.",
           "editCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
           "editCoursiersPlaq.max" => "La palque du vehicule ne peut pas dépasser :max caractères.",
           "selectedZone.required" => "Veuillez sélectionner une zone.",
           "selectedEmployer.required" => "Veuillez sélectionner le type d'employer.",
            "selectedVehicule.required" => "Veuillez sélectionner un vehicule.",
       ]);

        $coursiers = Coursier::findOrFail($coursier->id);
        $coursiers->nom = $this->editCoursiersName;
        $coursiers->prenom = $this->editCoursierPrenom;
        $coursiers->numero_telephone = $this->editCoursiersPhone1;
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

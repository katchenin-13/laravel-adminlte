<?php

namespace App\Livewire;

use App\Models\Zone;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Coursier;
use App\Models\Vehicule;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class CoursierComp extends Component
{
    use WithPagination;


    public $search = "";
    public $newCoursiersName = "";
    public $newCoursiersPrenom = "";
    public $newCoursiersPhone = "";
    public $newCoursiersPhone2 = "";
    public $newCoursiersNump = "";
    public $newCoursiersPlaq = "";
    public $newCoursiersSal = "";
    public $newCoursiersCni = "";
    public $newCoursiersPhoto = "";
    public $newCoursiersEmail = "";
    public $editCoursiersName = "";
    public $editCoursiersPrenom = "";
    public $editCoursiersPhone1 = "";
    public $editCoursiersPhone2 = "";
    public $editCoursiersNump = "";
    public $editCoursiersPlaq = "";
    public $editCoursiersSal = "";
    public $editCoursiersCni = "";
    public $editCoursiersPhoto = "";
    public $editCoursiersEmail = "";
    public $editCoursiersid ="";
    public $selectedCoursiers;
    public $selectedZone;
    public $selectedVehicule;
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

        $coursiers = Coursier::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('numero_telephone', 'like', '%'.$this->search.'%')
        ->paginate(10); // Adjust pagination limit as needed

        $zones = Zone::all();
        $vehicules = Vehicule::all();

        return view('livewire.coursier.index', compact('coursiers', 'zones', 'vehicules'))
                ->extends("layouts.app")
                ->section("content");
    }

    public function addNewCoursier()
    {
        $validatedData = $this->validate([
             "newCoursiersName" =>"required|max:20",
             "newCoursiersPrenom" =>"required|max:50",
             "newCoursiersPhone"=>"required|max:10|unique:coursiers,numero_telephone",
             "newCoursiersPhone2" =>"max:10",
             "newCoursiersNump" =>"required|max:20|unique:coursiers,numero_permis_conduire",
             "newCoursiersSal" =>"required|max:9|regex:/^\d+$/",
             "newCoursiersCni" =>"required|max:9|unique:coursiers,cni",
             "newCoursiersPhoto" =>"max:100",
             "newCoursiersPlaq" =>"required|max:20",
             "newCoursiersEmail" =>"required|max:50|unique:coursiers,email",
             "selectedVehicule" => "required",
             "selectedZone" => "required",
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
            "newCoursiersSal.required" => "Le champ du salaire du coursier est requis.",
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
        ]);

        $uuid = Uuid::uuid4()->toString();

        Coursier::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newCoursiersName"],
            "prenom" => $validatedData["newCoursiersPrenom"],
            "numero_telephone" => $validatedData["newCoursiersPhone"],
            "numero_telephone_2" => $validatedData["newCoursiersPhone2"],
            "numero_numero_permis_conduire" => $validatedData["newCoursiersNump"],
            "plaque_immatriculation" => $validatedData["newCoursiersPlaq"],
            "salaire" => $validatedData["newCoursiersSal"],
            "cni" => $validatedData["newCoursiersCni"],
            "photo" => $validatedData["newCoursiersPhoto"],
            "email" => $validatedData["newCoursiersEmail"],
            "vehicule_id" => $validatedData["selectedVehicule"],
            "zone_id" => $validatedData["selectedZone"],
        ]);
        session()->flash('message', 'Le coursier a été enregistré avec succès!');
        $this->reset('newCoursiersCni','selectedVehicule','selectedZone','newCoursiersEmail','newCoursiersPhoto','newCoursiersName','newCoursiersPrenom','newCoursiersPhone','newCoursiersPhone2','newCoursiersNump','newCoursiersPlaq','newCoursiersSal');
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
            "editCoursiersPhone1 "=>"required|max:10|unique:coursiers,numero_telephone",
            "editCoursiersPhone2" =>"max:10",
            "editCoursiersNump" =>"required|max:20|unique:coursiers,numero_permis_conduire",
            "editCoursiersSal" =>"required|max:9|regex:/^\d+$/",
            "editCoursiersCni" =>"required|max:9|unique:coursiers,cni",
            "newCoursiersPhoto" =>"max:100",
            "editCoursiersEmail" =>"required|max:10|unique:coursiers,email",
            "editCoursiersPlaq" =>"required|max:20",
            "selectedZone" => "required",
            "selectedVehicule" => "required",

       ], [
           "editCoursiersName.required" => "Le champ du nom du coursier est requis.",
           "editCoursiersName.max" => "Le nom du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPrenom.required" => "Le champ du prenom du coursier est requis.",
           "editCoursiersPrenom.max" => "Le prenom du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPhone1.required" => "Le champ du téléphone du coursier est requis.",
           "editCoursiersPhone1.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPhone1.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
           "editCoursiersPhone2.max" => "Le téléphone du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersPhone2.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
           "editCoursiersNump.required" => "Le champ du numero de permis du coursier est requis.",
           "editCoursiersNump.max" => "Le numero de permis du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersNump.unique" => "numero de permis est déjà utilisé.",
           "editCoursiersSal.required" => "Le champ du salaire du coursier est requis.",
           "editCoursiersSal.max" => "Le salaire du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersSal.regex" => "Le champ du salaire peut contenir que des chiffres.",
           "editCoursiersEmail.required" => "Le champ email du coursier est requis.",
           "editCoursiersEmail.max" => "L'email du coursier ne peut pas dépasser :max caractères.",
           "newCoursiersEmail.unique" => "Email est déjà utilisé.",
           "editCoursiersCni.required" => "Le champ cni du coursier est requis.",
           "editCoursiersCni.max" => "La cni du coursier ne peut pas dépasser :max caractères.",
           "editCoursiersCni.unique" => "Cni existe déjà.",
           "editCoursiersPlaq.required" => "Le champ plaque du coursier est requis.",
           "editCoursiersPlaq.max" => "La palque du vehicule ne peut pas dépasser :max caractères.",
           "selectedZone.required" => "Veuillez sélectionner une zone.",
            "selectedVehicule.required" => "Veuillez sélectionner un vehicule.",
       ]);

        $coursiers = Coursier::findOrFail($coursier->id);
        $coursiers->nom = $this->editCoursiersName;
        $coursiers->prenom = $this->editCoursierPrenom;
        $coursiers->numero_telephone = $this->editCoursierPhone1;
        $coursiers->numero_telephone_2 = $this->editCoursierPhone2;
        $coursiers->numero_permis_conduire = $this->editCoursiersNump;
        $coursiers->plaque_immatriculation = $this->editCoursierPlaq;
        $coursiers->salaire = $this->editCoursierSal;
        $coursiers->cni = $this->editCoursierCni;
        $coursiers->photo = $this->editCoursierPhoto;
        $coursiers->email= $this->editCoursierEmail;
        $result = $coursiers->save();
        $coursiers->nom = "";
        $coursiers->prenom = "";
        $coursiers->numero_telephone = "";
        $coursiers->numero_telephone_2 = "";
        $coursiers->numero_permis_conduire = "";
        $coursiers->plaque_immatriculation = "";
        $coursiers->salaire = "";
        $coursiers->cni = "";
        $coursiers->photo= "";
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
        $this->editCoursiersPhone2 = $editCoursier->numero_telephone_2;
        $this->editCoursiersNump = $editCoursier->numero_permis_conduire;
        $this->editCoursiersPlaq= $editCoursier->plaque_immatriculation;
        $this->editCoursiersSal = $editCoursier->salaire;
        $this->editCoursiersCni= $editCoursier->cni;
        $this->editCoursiersPhoto = $editCoursier->photo;
        $this->editCoursiersEmail = $editCoursier->email;

        $selectedZone = Zone::find($editCoursier->zone_id);

        if ($selectedZone) {

            $this->selectedZone = $selectedZone->id;
        } else {

            $this->selectedZone = null;
        }

        $selectedVehicule = Vehicule::find($editCoursier->vehicule_id);

        if ($selectedVehicule) {
            $this->selectedVehicule = $selectedVehicule->id;
        } else {

            $this->selectedVehicule = null;
        }

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

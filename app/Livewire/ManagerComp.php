<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
use App\Models\Manager;
use Livewire\Component;
use App\Models\Employer;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ManagerComp extends Component
{
    use WithPagination;

    public $search = "";
    public $manager;
    public $newnom = "";
    public $newprenom = "";
    public $newphone = "";
    public $newphone2 = "";
    public $newemail = "";
    public $editnom = "";
    public $editprenom = "";
    public $editphone = "";
    public $editphone2 = "";
    public $editemail = "";
    public $editmanagerId = "";
    public $selectedManager ;
    public $selectedEmployer = "";
    public $showDeleteModal = false;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        // Récupérer les managers filtrés par la recherche
        $managers = Manager::where('nom', 'like', $searchCriteria)
                           ->orWhere('email', 'like', $searchCriteria)
                           ->orWhere('prenom', 'like', $searchCriteria)
                           ->orWhere('uuid', 'like', $searchCriteria)
                           ->paginate(10);

         $employers = Employer::all();

        // Retourner la vue avec les données nécessaires
        return view('livewire.manager.index', [
            'managers' => $managers, // Passer les managers à la vue
            'employers' => $employers,
        ])->extends("layouts.app")
          ->section("content");
          dd($employers);
    }

    public function addNewManager()
    {
        // Valider les données d'entrée
        $validatedData = $this->validate([
            "newnom" => "required|max:20",
            "newprenom" => "required|max:50",
            "newphone" => "required|max:10|regex:/^[0-9]+$/:unique:managers,numero_telephone",
            "newemail" => "required|max:50|unique:managers,email",
            "newphone2" => "max:10|regex:/^[0-9]+$/::unique:managers,numero_telephone_2",
            "selectedEmployer" => "required",
        ], [
            "newnom.required" => "Le champ du nom du manager est requis.",
            "newnom.max" => "Le nom du manager ne peut pas dépasser :max caractères.",
            "newprenom.required" => "Le champ du prénom du manager est requis.",
            "newprenom.max" => "Le prénom du manager ne peut pas dépasser :max caractères.",
            "newphone.required" => "Le champ du téléphone du manager est requis.",
            "newphone.max" => "Le téléphone du manager ne peut pas dépasser :max caractères.",
            "newphone.unique" => "Le numéro de téléphone est déjà utilisé.",
            "newphone2.max" => "Le deuxième téléphone du manager ne peut pas dépasser :max caractères.",
            "newphone2.required" => "Le champ du téléphone du manager est requis.",
            "newemail.required" => "Le champ email du manager est requis.",
            "newemail.max" => "L'email du manager ne peut pas dépasser :max caractères.",
            "newemail.unique" => "L'email est déjà utilisé.",
            "selectedEmployer.required" => "Veuillez sélectionner un employeur.",
        ]);

        // Générer un UUID pour le nouveau manager
        $uuid = Uuid::uuid4()->toString();

        // Créer un nouveau manager
        $newManager = Manager::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newnom"],
            "prenom" => $validatedData["newprenom"],
            "numero_telephone" => $validatedData["newphone"],
            "numero_telephone_2" => $validatedData["newphone2"],
            "email" => $validatedData["newemail"],
            "employer_id" => $validatedData["selectedEmployer"],
        ]);

        // Flash message de succès
        session()->flash('message', 'Le manager a été enregistré avec succès!');

        // Réinitialiser les champs du formulaire
        $this->reset('newnom', 'newprenom', 'newphone', 'newphone2', 'newemail', 'selectedEmployer');
    }


    public function updateManager(Manager $manager)
    {
        $validated = $this->validate([
            "editnom" => "required|max:20",
            "editprenom" => "required|max:50",
            "editphone" => ["required","max:10","regex:/^[0-9]+$/",Rule::unique('managers')->ignore($manager->id),],
            "editemail" => ["required","max:50",Rule::unique('managers')->ignore($manager->id),],
            "editphone2" => ["max:10","regex:/^[0-9]+$/",Rule::unique('managers')->ignore($manager->id),],
            "selectedEmployer" => "required",
        ], [
            "editnom.required" => "Le champ du nom du manager est requis.",
            "editnom.max" => "Le nom du manager ne peut pas dépasser :max caractères.",
            "editprenom.required" => "Le champ du prénom du manager est requis.",
            "editprenom.max" => "Le prénom du manager ne peut pas dépasser :max caractères.",
            "editphone.required" => "Le champ du téléphone du manager est requis.",
            "editphone.max" => "Le téléphone du manager ne peut pas dépasser :max caractères.",
            "editphone.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "editphone.unique" => "Le numéro de téléphone est déjà utilisé.",
            "editphone2.max" => "Le deuxième téléphone du manager ne peut pas dépasser :max caractères.",
            "editphone2.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "editphone2.unique" => "Le numéro de téléphone est déjà utilisé.",
            "editemail.required" => "Le champ email du manager est requis.",
            "editemail.max" => "L'email du manager ne peut pas dépasser :max caractères.",
            "editemail.unique" => "L'email est déjà utilisé.",
            "selectedEmployer.required" => "Veuillez sélectionner un employeur.",
       ]);

        $managers = Manager::findOrFail($manager->id);
        $managers->nom = $validated['editnom'];
        $managers->prenom = $validated['editprenom'];
        $managers->numero_telephone= $validated['editphone'];
        $managers->numero_telephone2 = $validated['editphone2'];
        $managers->email = $validated['editemail'];

        $managers->save();


    }

    public function updateEmployer($managerId, $employerId)
    {
        $manager = Manager::findOrFail($employerId);
        $manager->employer_id = $employerId;
        $manager->save();

    }





    public function showProp(Manager $manager)
    {
        $this->selectedManager = $manager;
        $this->dispatch("CreateModal", []);
    }

        public function showPropE(Manager $manager)
    {

        $editManager = $manager;
        $this->editmanagerId = $editManager ->id;
        $this->editnom = $editManager ->nom;
        $this->editprenom = $editManager ->prenom;
        $this->editphone = $editManager ->numero_telephone;
        $this->editphone2 = $editManager ->numero_telephone_2;
        $this->editemail = $editManager ->email;
        //dd($editEmployer);
        $selectedEmployer = Employer::find($editManager->employer_id);

        if ($selectedEmployer) {
            $this->selectedEmployer = $selectedEmployer->id;
        } else {
            $this->selectedEmployer = null;
        }

        $this->dispatch("showEditModal", [$manager->nom,$manager->prenom,$manager->numero_telephone_2,$manager->email,$manager->numero_telephone_2]);

        $this->dispatch("EditModal",);
    }

    public function showPropC(Manager $manager)
    {
        $this->selectedManager = $manager;
        $this->dispatch("readModal", []);
    }

    public function showPropD(Employer $employer)
    {
        $this->selectedEmployer = $employer;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteManager()
    {
        if ($this->selectedManager) {
            $this->selectedManager->delete();
            $this->dispatch('ManagerDeleted');
        }
    }
}

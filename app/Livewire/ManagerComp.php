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
    public $newNom = "";
    public $newPrenom = "";
    public $newPhone = "";
    public $newPhone2 = "";
    public $newEmail = "";
    public $editNom = "";
    public $editPrenom = "";
    public $editPhone = "";
    public $editPhone2 = "";
    public $editEmail = "";
    public $editManagerId = "";
    public $selectedManager;
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
            "newNom" => "required|max:20",
            "newPrenom" => "required|max:50",
            "newEmail" => "required|max:50|unique:managers,email",
            "newPhone" => "required|max:10|regex:/^[0-9]+$/|unique:managers,numero_telephone",
            "newPhone2" => "nullable|max:10|regex:/^[0-9]+$/|unique:managers,numero_telephone_2",
            "selectedEmployer" => "required",
        ], [
            "newNom.required" => "Le champ du nom du manager est requis.",
            "newNom.max" => "Le nom du manager ne peut pas dépasser :max caractères.",
            "newPrenom.required" => "Le champ du prénom du manager est requis.",
            "newPrenom.max" => "Le prénom du manager ne peut pas dépasser :max caractères.",
            "newPhone.required" => "Le champ du téléphone du manager est requis.",
            "newPhone.max" => "Le téléphone du manager ne peut pas dépasser :max caractères.",
            "newPhone.regex" => "Le champ du téléphone ne peut contenir que des chiffres.",
            "newPhone.unique" => "Le numéro de téléphone est déjà utilisé.",
            "newPhone2.max" => "Le deuxième téléphone du manager ne peut pas dépasser :max caractères.",
            "newPhone2.regex" => "Le champ du deuxième téléphone ne peut contenir que des chiffres.",
            "newEmail.required" => "Le champ email du manager est requis.",
            "newEmail.max" => "L'email du manager ne peut pas dépasser :max caractères.",
            "newEmail.unique" => "L'email est déjà utilisé.",
            "selectedEmployer.required" => "Veuillez sélectionner un employeur.",
        ]);

        // Générer un UUID pour le nouveau manager
        $uuid = Uuid::uuid4()->toString();

        // Créer un nouveau manager
        Manager::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newNom"],
            "prenom" => $validatedData["newPrenom"],
            "numero_telephone" => $validatedData["newPhone"],
            "numero_telephone_2" => $validatedData["newPhone2"] ?: null,
            "email" => $validatedData["newEmail"],
            "employer_id" => $validatedData["selectedEmployer"],
        ]);

        // Flash message de succès
        session()->flash('message', 'Le manager a été enregistré avec succès!');

        // Réinitialiser les champs du formulaire
        $this->reset('newNom', 'newPrenom', 'newPhone', 'newPhone2', 'newEmail', 'selectedEmployer');
    }


    public function updateManager(Manager $manager)
    {
        $validated = $this->validate([
            "editNom" => "required|max:20",
            "editPrenom" => "required|max:50",
            "newPhone" => "required|max:10|regex:/^[0-9]+$/|unique:managers,numero_telephone" . $manager->id,
            "editEmail" => "required|max:50|unique:managers,email," . $manager->id,
            "editPhone2" => "nullable|max:10|regex:/^[0-9]+$/|unique:managers,numero_telephone_2," . $manager->id,
            "selectedEmployer" => "required",
        ], [
            "editNom.required" => "Le champ du nom du manager est requis.",
            "editNom.max" => "Le nom du manager ne peut pas dépasser :max caractères.",
            "editPrenom.required" => "Le champ du prénom du manager est requis.",
            "editPrenom.max" => "Le prénom du manager ne peut pas dépasser :max caractères.",
            "editPhone.required" => "Le champ du téléphone du manager est requis.",
            "editPhone.max" => "Le téléphone du manager ne peut pas dépasser :max caractères.",
            "editPhone.regex" => "Le champ du téléphone ne peut contenir que des chiffres.",
            "editPhone.unique" => "Le numéro de téléphone est déjà utilisé.",
            "editPhone2.max" => "Le deuxième téléphone du manager ne peut pas dépasser :max caractères.",
            "editPhone2.regex" => "Le champ du deuxième téléphone ne peut contenir que des chiffres.",
            "editEmail.required" => "Le champ email du manager est requis.",
            "editEmail.max" => "L'email du manager ne peut pas dépasser :max caractères.",
            "editEmail.unique" => "L'email est déjà utilisé.",
            "selectedEmployer.required" => "Veuillez sélectionner un employeur.",
        ]);


            // $managers->numero_telephone = $validated['editPhone'];
            // $manager->numero_telephone_2 = $validated['editPhone2'] ?: null;
            // $managers->email = $validated['editEmail'];
            // $managers->save();

            $manager->update([
                'nom' => $this->editNom,
                'prenom' => $this->editPrenom,
                'numero_telephone' => $this->editPhone2 ?: null,
                'numero_telephone_2' => $this->editCoursiersNump,
                'email' => $this->editEmail,
                'employer'
            ]);

    session()->flash('message', "Le manager a été mis à jour avec succès !");
    }

    public function updateEmployer($managerId, $employerId)
    {
        $manager= Manager::findOrFail($managerId);
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
        $this->editManagerId = $manager->id;
        $this->editNom = $manager->nom;
        $this->editPrenom = $manager->prenom;
        $this->editPhone = $manager->numero_telephone;
        $this->editPhone2 = $manager->numero_telephone_2;
        $this->editEmail = $manager->email;

        $this->selectedEmployer = $manager->employer_id;

        $this->dispatch("EditModal", [$manager->nom,$manager->prenom,$manager->numero_telephone,$manager->numero_telephone_2,$manager->email,$manager->selectedEmployer]);
    }

    public function showPropC(Manager $manager)
    {
        $this->selectedManager = $manager;
        $this->dispatch("readModal", []);
    }

    public function showPropD(Manager $manager)
    {
        $this->selectedManager = $manager;
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

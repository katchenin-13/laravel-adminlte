<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Employer;
use Illuminate\Support\Carbon;

class EmployerComp extends Component
{
    public $employer;
    public $newPost;
    public $newSalaire;
    public $editPost;
    public $editSalaire;
    public $editEmployerid;
    public $selectedEmployer;
    public $showDeleteModal = false;
    public $search = "";
    public $loading = false;


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $this->loading = true;
        // Requête pour récupérer les employers en fonction de la recherche
        $employer= Employer::where('poste', 'like', '%'.$this->search.'%')
                             ->orWhere('uuid', 'like', '%'.$this->search.'%')
                             ->paginate(10);


        $this->loading = false;
        return view('livewire.employer.index', [
            'employers' => $employer,

        ])->extends("layouts.app")
          ->section("content");
    }

    public function searchEmployer()
    {
        $this->resetPage();
    }

    public function NewEmployer()
    {
        $validatedData = $this->validate([
            "newPost" => "required|max:50",
            "newSalaire" => "required|max:12|regex:/^\d+(\.\d{1,2})?$/", // Ajout de la règle regex pour vérifier les chiffres
        ], [
            "newPost.required" => "Le champ du nom du poste est requis.",
            "newPost.max" => "Le nom du poste ne peut pas dépasser :max caractères.",
            "newSalaire.required" => "Le champ salaire est requis.",
            "newSalaire.max" => "Le salaire ne peut pas dépasser :max caractères.",
            "newSalaire.regex" => "Le salaire doit être un nombre valide avec au plus deux décimales.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Employer::create([
            "uuid" => $uuid,
            "poste" => $validatedData["newPost"],
            "salaire" => $validatedData["newSalaire"],
        ]);


        session()->flash('message', 'L\'employer a été enregistré avec succès!');
        $this->reset('newPost','newSalaire');
    }

    public function updateEmployer(Employer $employer)
    {
        $validated = $this->validate([
            "editPost" => "required|max:50",
            "editSalaire" => "required|max:12",

       ], [
        "editPost.required" => "Le champ du nom du  poste est requis.",
        "editPost.max" => "Le nom du post ne peut pas dépasser :max caractères.",
        "newSalaire.max" => "Le salaire de chaque poste ne peut pas dépasser :max caractères.",
        "newSalaire.regex" => "Le salaire peut contenir que des chiffres.",
        "newSalaire.required" => "Le champ salaire est requis.",
       ]);

        $employer->update([
        'poste' => $validated['editPost'],
        'salaire' => $validated['editSalaire'],

        ]);

        session()->flash('message', "L\'employé a été mis à jour avec succès !");
    

    }

    public function showProp(Employer $employer)
    {
        $this->selectedEmployer = $employer;
        $this->dispatch("CreateModal", []);
    }

    public function showPropE(Employer $employer)
    {

        $editEmployer = $employer;
        $this->editEmployerid = $editEmployer ->id;
        $this->editPost = $editEmployer ->poste;
        $this->editSalaire = $editEmployer ->salaire;
        //dd($editEmployer);

        $this->dispatch("EditModal", [$employer->poste,$employer->salaire]);
    }

    public function showPropC(Employer $employer)
    {
        $this->selectedEmployer = $employer;
        $this->dispatch("readModal", []);
    }

    public function showPropD(Employer $employer)
    {
        $this->selectedEmployer = $employer;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteEmployer()
    {
        if ($this->selectedEmployer) {
            $this->selectedEmployer->delete();
            $this->dispatch('employerDeleted');
        }
    }


}

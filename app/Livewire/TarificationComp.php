<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categorie;
use App\Models\Tarification;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class TarificationComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newTarificationPrix = "";
    public $editTarificationPrix = "";
    public $editTarificationId = "";
    public $selectedTarification;
    public $selectedCategorie = "";
    public $showDeleteModal = false;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $tarifications = Tarification::where("prix", "like", $searchCriteria)->latest()->paginate(10);
        $categories = Categorie::all();

        return view('livewire.tarification.index', compact('tarifications', 'categories'))
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewTarification()
    {
        $validatedData = $this->validate([
            "newTarificationPrix" => ["required", "max:20", "regex:/^\d+$/", Rule::unique("tarifications", "prix")],
            "selectedCategorie" => "required"
        ], [
            "newTarificationPrix.required" => "Le champ du prix est requis.",
            "newTarificationPrix.max" => "Le prix ne peut pas dépasser :max caractères.",
            "newTarificationPrix.regex" => "Le champ du prix ne peut contenir que des chiffres.",
            "selectedCategorie.required" => "Le champ de la catégorie est requis."
        ]);

        Tarification::create([
            "prix" => $validatedData["newTarificationPrix"],
            "categorie_id" => $validatedData["selectedCategorie"]
        ]);

        session()->flash('message', 'Le prix a été enregistré avec succès!');
    }


    public function updateTarification(Tarification $tarification)
    {
        $validated = $this->validate([
            "editTarificationPrix" => ["required", "max:10", Rule::unique("tarifications", "prix")->ignore($tarification->id)],
        ], [
            "editTarificationPrix.required" => "Le champ prix est requis.",
            "editTarificationPrix.max" => "Le prix ne peut pas dépasser :max caractères."
        ]);

        $tarification->prix = $this->editTarificationPrix;
        $tarification->save();
        $this->editTarificationPrix = ""; // Assurez-vous de réinitialiser la propriété après la sauvegarde
    }



    public function showProp(Tarification $tarification)
    {
        $this->selectedTarification = $tarification;
        $this->dispatch("showModal", []);
    }




    public function showPropD(Tarification $tarification)
    {
        $this->showDeleteModal = true; // Définir la propriété pour afficher le modal

        $tarification->delete();

        $this->dispatch("closeDeleteModal");
    }

    public function showPropC(Tarification $tarification)
    {
        $this->selectedTarification = $tarification->prix;

        $this->dispatch("showReadModal", []);

        // dd('bonjour');
    }



    public function showPropE(Tarification $tarification)
    {
        $this->editTarificationId = $tarification->id;
        $this->editTarificationPrix = $tarification->prix;

        $this->dispatch("showEditModal", $tarification->prix);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal");
    }

    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->showDeleteModal = false;
        $this->dispatch("closeDeleteModal");
    }


}

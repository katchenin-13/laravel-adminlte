<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
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
    public $tarification;
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

        $tarification = Tarification::where('prix', 'like', '%'.$this->search.'%')
        ->orWhere('uuid', 'like', '%'.$this->search.'%')
        ->paginate(10);

        $categories = Categorie::all();

        return view('livewire.tarification.index', [
            'categories' => $categories,
            'tarifications' => $tarification,
          ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewTarification()
    {
        $validatedData = $this->validate([
            "newTarificationPrix" => ["required", "max:9", "regex:/^\d+$/", Rule::unique("tarifications", "prix")],
            "selectedCategorie" => "required"
        ], [
            "newTarificationPrix.required" => "Le champ du prix est requis.",
            "newTarificationPrix.max" => "Le prix ne peut pas dépasser :max caractères.",
            "newTarificationPrix.regex" => "Le champ du prix ne peut contenir que des chiffres.",
            "selectedCategorie.required" => "Le champ de la catégorie est requis."
        ]);

        $uuid = Uuid::uuid4()->toString();
        Tarification::create([
            "uuid" => $uuid,
            "prix" => $validatedData["newTarificationPrix"],
            "categorie_id" => $validatedData["selectedCategorie"]
        ]);

        session()->flash('message', 'Le prix a été enregistré avec succès!');
        $this->reset('newTarificationPrix','selectedCategorie');
    }


    public function updateTarification(Tarification $tarification)
    {
        $validated = $this->validate([
            "editTarificationPrix" => ["required", "max:10", Rule::unique("tarifications", "prix")->ignore($tarification->id)],
            "selectedCategorie" => ["required"],
        ], [
            "editTarificationPrix.required" => "Le champ prix est requis.",
            "editTarificationPrix.max" => "Le prix ne peut pas dépasser :max caractères.",
            "selectedCategorie.required" => "Le champ categorie est requis.",
        ]);

        $tarifications = Tarification::findOrFail($tarification->id);
        $tarification->prix = $this->editTarificationPrix;
        $result = $tarification->save();
        $this->editTarificationPrix = "";
        session()->flash('message', 'Le tarif a été mise a jour avec succès!');
        $this->closeEditModal();
    }

    public function updateCategorie($tarificationId, $categorieId)
    {
        $tarification = Tarification::findOrFail($tarificationId);
        $tarification->categorie_id = $categorieId;
        $tarification->save();
    }



    public function showProp(Tarification $tarification)
    {
        $this->selectedTarification = $tarification;
        $this->dispatch("showModal", []);
    }




    public function showPropD(Tarification $tarification)
    {
        $this->selectedTarification = $tarification;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteTarification()
    {
        if ($this->selectedTarification) {
            $this->selectedTarification->delete();
            $this->dispatch('tarificationDeleted');
        }
    }

    public function showPropC(Tarification $tarification)
    {
        $this->selectedTarification = $tarification;

        $this->dispatch("ReadModal", []);

        // dd('bonjour');
    }



    public function showPropE(Tarification $tarification)
    {
        $editTarification = $tarification;
        $this->editTarificationId = $tarification->id;
        $this->editTarificationPrix = $tarification->prix;
                $selectedCategorie = Categorie::find($editTarification->categorie_id);

                if ($selectedCategorie) {
                    $this->selectedCategorie = $selectedCategorie->id;
                } else {

                    $this->selectedCategorie = null; // ou toute autre valeur par défaut
                }

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

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal");
    }


    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->showDeleteModal = false;
        $this->dispatch("closeDeleteModal");
    }


}

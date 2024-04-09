<?php

namespace App\Livewire;

use App\Models\Colis;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class ColisComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newColisName = "";
    public $newColisDes = "";
    public $newColisQuan = "";
    public $editColisName = "";
    public $editColisDes = "";
    public $editColisQuan = "";
    public $editColisid ="";
    public $selectedColis;
    public $selectedCategorie;
    // public $colisCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    // public function mount()
    // {
    //    $this->colisCount = Colis::count();

    // }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $colis = Colis::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        // $colisCount = $this->colisCount;
        $categories = Categorie::all();
        return view('livewire.colis.index', compact('colis','categories'))
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewColis()
    {
        $validatedData = $this->validate([
            "newColisName" => "required|max:20",
            "newColisDes" => "required|max:550",
            "newColisQuan" => "required|max:100",
            "selectedCategorie" => "required",
        ], [
            "newColisName.required" => "Le champ du nom du colis est requis.",
            "newColisName.max" => "Le nom du colis ne peut pas dépasser :max caractères.",
            "newColisDes.required" => "Le champ description du colis est requis.",
            "newColisDes.max" => "Le description du colis ne peut pas dépasser :max caractères.",
            "newColisQuan.required" => "Le champ quantité du colis est requis.",
            "newColisQuan.max" => "La quantité du colis ne peut pas dépasser :max caractères.",
            "selectedCategorie.required" => "Veuillez sélectionner une catégorie.",
        ]);

        Colis::create([
            "nom" => $validatedData["newColisName"],
            "description" => $validatedData["newColisDes"],
            "quantite" => $validatedData["newColisQuan"],
            "categorie_id" => $validatedData["selectedCategorie"],
        ]);
        session()->flash('message', 'Le colis a été enregistré avec succès!');
        $this->reset('newColisName','newColisDes','newColisQuan','selectedCategorie');
    }



    public function showProp(Colis $colis)
    {
        $this->selectedColis = $colis;
        $this->dispatch("ModalCreate", []);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }

    public function updateColis(Colis $colis)
    {
        $validated = $this->validate([
            "editColisName" => ["required", "max:20"],
            "editColisDes" => ["required", "max:550"],
            "editColisQuan" => ["required", "max:100"],

        ], [
            "editColisName.required" => "Le champ du nom du colis est requis.",
            "editColisName.max" => "Le nom du colis ne peut pas dépasser :max caractères.",
            "editColisDes.required" => "Le champ description du colis est requis.",
            "editColisDes.max" => "Le description du colis ne peut pas dépasser :max caractères.",
            "editColisQuan.required" => "Le champ quantité du colis est requis.",
            "editColisQuan.max" => "La quantité du colis ne peut pas dépasser :max caractères.",
            "selectedCategorie.required" => "Veuillez sélectionner une catégorie.",
        ]);

        $colis = Colis::findOrFail($colis->id);
        $colis->nom = $this->editColisName;
        $colis->description = $this->editColisDes;
        $colis->quantite = $this->editColisQuan;
        $result = $colis->save();
        $colis->nom = "";
        $colis->description = "";
        $colis->quantite = "";

    }
    public function updateCategorie($colisId, $categorieId)
    {
        $colis = Colis::findOrFail($colisId);
        $colis->categorie_id = $categorieId;
        $colis->save();

    }

    public function showPropE(Colis $colis)
    {
        $editColis = $colis;
        $this->editColisid = $editColis->id;
        $this->editColisName = $editColis->nom;
        $this->editColisDes = $editColis->description;
        $this->editColisQuan= $editColis->quantite;

        // Récupérer la commune sélectionnée en fonction de l'ID de la commune associée à la categorie
        $selectedCategorie = Categorie::find($editColis->categorie_id);

        if ($selectedCategorie) {
            // Si la commune est trouvée, définissez-la comme commune sélectionnée
            $this->selectedCategorie = $selectedCategorie->id;
        } else {
            // Si la commune n'est pas trouvée, définissez la commune sélectionnée sur null ou une valeur par défaut
            $this->selectedCategorie = null; // ou toute autre valeur par défaut
        }

        $this->dispatch("showEditModal", [$colis->nom,$colis->description,$colis->telephone,$colis->email,$colis->secteuract]);
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal", []);
    }

    public function showPropD(Colis $colis)
    {
        $this->showDeleteModal = true;


        $colis->delete();
        $this->dispatch("closeDeleteModal", []);
    }

    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeDeleteModal", []);
    }
}

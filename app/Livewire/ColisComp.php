<?php

namespace App\Livewire;

use App\Models\Colis;
use Ramsey\Uuid\Uuid;
use App\Models\Client;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class ColisComp extends Component
{
    use WithPagination;

    public $colisse;
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
    public $selectedClient;
    // public $colisCount;
    public $showDeleteModal=false;



    protected $paginationTheme = "bootstrap";

    // public function mount()
    // {
    //    $this->colisCount = Colis::count();

    // }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $colisse = Colis::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('uuid', 'like', '%'.$this->search.'%')
        ->paginate(10);

        // $colisCount = $this->colisCount;
        $categories = Categorie::all();

        $clients = Client::all();

        return view('livewire.colis.index', [
            'categories' => $categories,
            'clients' => $clients,
            'colis' => $colisse,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewColis()
    {
        $validatedData = $this->validate([
            "newColisName" => "required|max:20",
            "newColisDes" => "required|max:550",
            "newColisQuan" => "required|max:100",
            "selectedClient" => "required",
            "selectedCategorie" => "required",
        ], [
            "newColisName.required" => "Le champ du nom du colis est requis.",
            "newColisName.max" => "Le nom du colis ne peut pas dépasser :max caractères.",
            "newColisDes.required" => "Le champ description du colis est requis.",
            "newColisDes.max" => "Le description du colis ne peut pas dépasser :max caractères.",
            "newColisQuan.required" => "Le champ quantité du colis est requis.",
            "newColisQuan.max" => "La quantité du colis ne peut pas dépasser :max caractères.",
            "selectedClient.required" => "Veuillez sélectionner le client.",
            "selectedCategorie.required" => "Veuillez sélectionner une catégorie.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Colis::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newColisName"],
            "description" => $validatedData["newColisDes"],
            "quantite" => $validatedData["newColisQuan"],
            "client_id" => $validatedData["selectedClient"],
            "categorie_id" => $validatedData["selectedCategorie"],
        ]);
        session()->flash('message', 'Le colis a été enregistré avec succès!');
        $this->reset('newColisName','newColisDes','newColisQuan','selectedClient','selectedCategorie');
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
            "selectedClient.required" => "Veuillez sélectionner le client.",
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
    public function updateCategorie($colisId,$clientId, $categorieId)
    {
        $colis = Colis::findOrFail($colisId);
        $colis->client_id = $clientId;
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
            $this->selectedCategorie = $selectedCategorie->id;
        } else {
            $this->selectedCategorie = null;
        }

        $selectedClient = Client::find($editColis->client_id);

        if ($selectedClient) {

            $this->selectedClient = $selectedClient->id;
        } else {
            $this->selectedClient = null;
        }

        $this->dispatch("showEditModal", [$colis->nom,$colis->description,$colis->telephone,$colis->email,$colis->secteuract]);
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal", []);
    }

    public function showPropC(Colis $colis)
    {
        $this->selectedColis = $colis;
        $this->dispatch("readModal", []);
    }

    public function closeReadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal");
    }




    public function showPropD(Colis $colis)
    {
        $this->selectedColis = $colis;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteColis()
    {
        if ($this->selectedColis) {
            $this->selectedColis->delete();
            $this->dispatch('colisDeleted'); // Déclenche l'événement après la suppression
        }
    }

    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeDeleteModal", []);
    }
}

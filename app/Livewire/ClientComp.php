<?php

namespace App\Livewire;

use App\Models\Zone;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class ClientComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newClientName = "";
    public $newClientPrenom = "";
    public $newClientPhone = "";
    public $newClientEmail = "";
    public $newClientSecteur = "";
    public $editClientName = "";
    public $editClientid ="";
    public $selectedClient;
    public $selectedZone;
    // public $clientCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    // public function mount()
    // {
    //    $this->clientCount = Client::count();

    // }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $clients = Client::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        // $clientCount = $this->clientCount;
        $zones = Zone::all();
        return view('livewire.client.index', compact('clients','zones'))
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewZone()
    {
        $validatedData = $this->validate([
            "newClientName" => "required|max:20|clients,nom",
            "newClientPrenom" => "required|max:50|clients,prenom",
            "newClientPhone" => "required|max:10|unique:clients,telephone",
            "newClientEmail" => "required|max:30|unique:clients,email",
            "newClientSecteur" => "required|max:20|clients,secteuract",
            "selectedZone" => "required",
        ], [
            "newClientName.required" => "Le champ du nom du client est requis.",
            "newClientName.max" => "Le nom du client ne peut pas dépasser :max caractères.",
            "newClientPrenom.required" => "Le champ du prenom du client est requis.",
            "newClientPrenom.max" => "Le prenom du client ne peut pas dépasser :max caractères.",
            "newClientPhone.required" => "Le champ du téléphone du client est requis.",
            "newClientPhone.max" => "Le téléphone du client ne peut pas dépasser :max caractères.",
            "newClientEmail.required" => "Le champ email du client est requis.",
            "newClientEmail.max" => "L'email du client ne peut pas dépasser :max caractères.",
            "newZoneEmail.unique" => "Email est déjà utilisé.",
            "newClientSecteur.required" => "Le champ du seacteur d'activité du client est requis.",
            "newClientSecteur.max" => "Le secteur d'activité du client ne peut pas dépasser :max caractères.",
            "selectedZone.required" => "Veuillez sélectionner une commune.",
        ]);

        Client::create([
            "nom" => $validatedData["newZoneName"],
            "prenom" => $validatedData["newZonePrenom"],
            "telephone" => $validatedData["newZonePhone"],
            "email" => $validatedData["newZoneEmail"],
            "secteuract" => $validatedData["newZoneSecteur"],
            "zone_id" => $validatedData["selectedZone"],
        ]);

        session()->flash('message', 'Le client a été enregistré avec succès!');
    }



    public function showProp(Client $client)
    {
        $this->selectedClient = $client;
        $this->dispatch("showModal", []);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }
}

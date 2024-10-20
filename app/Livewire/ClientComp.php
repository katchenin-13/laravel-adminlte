<?php

namespace App\Livewire;

use App\Models\Zone;
use Ramsey\Uuid\Uuid;
use App\Models\Client;
use Livewire\Component;
use App\Mail\ClientMail;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Events\NewclientCreated;
use Illuminate\Support\Facades\Mail;


class ClientComp extends Component
{
    use WithPagination;

    public $search = "";
    public $client;
    public $newClientName = "";
    public $newClientPrenom = "";
    public $newClientPhone = "";
    public $newClientEmail = "";
    public $newClientSecteur = "";
    public $editClientName = "";
    public $editClientPrenom = "";
    public $editClientPhone = "";
    public $editClientEmail = "";
    public $editClientSecteur = "";
    public $editClientid ="";
    public $selectedClient;
    public $selectedZone;
    public $clientCount;
    public $showDeleteModal="false";
    public $clientToDelete;
    protected $paginationTheme = "bootstrap";

     public function mount()
     {
        $this->clientCount = Client::count();

    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $client = Client::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('uuid', 'like', '%'.$this->search.'%')
        ->orWhere('prenom', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->paginate(10);

        $zones = Zone::all();

        return view('livewire.client.index',[
            'clients' => $client,
            'zones' => $zones,
        ])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewClient()
    {
        $validatedData = $this->validate([
            "newClientName" => "required|max:20",
            "newClientPrenom" => "required|max:50",
            "newClientPhone" => "required|max:10|regex:/^[0-9]+$/|unique:clients,telephone",
            "newClientEmail" => "required|max:50|unique:clients,email",
            "newClientSecteur" => "required|max:20",
            "selectedZone" => "required",
        ], [
            "newClientName.required" => "Le champ du nom du client est requis.",
            "newClientName.max" => "Le nom du client ne peut pas dépasser :max caractères.",
            "newClientPrenom.required" => "Le champ du prenom du client est requis.",
            "newClientPrenom.max" => "Le prenom du client ne peut pas dépasser :max caractères.",
            "newClientPhone.required" => "Le champ du téléphone du client est requis.",
            "newClientPhone.max" => "Le téléphone du client ne peut pas dépasser :max caractères.",
            "newClientPhone.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "newClientPhone.unique" => "le numéro est déjà utilisé..",
            "newClientEmail.required" => "Le champ email du client est requis.",
            "newClientEmail.max" => "L'email du client ne peut pas dépasser :max caractères.",
            "newClientEmail.unique" => "Email est déjà utilisé.",
            "newClientSecteur.required" => "Le champ du seacteur d'activité du client est requis.",
            "newClientSecteur.max" => "Le secteur d'activité du client ne peut pas dépasser :max caractères.",
            "selectedZone.required" => "Veuillez sélectionner une client.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        $newClient = Client::create([
            "uuid" => $uuid,
            "nom" => $validatedData["newClientName"],
            "prenom" => $validatedData["newClientPrenom"],
            "telephone" => $validatedData["newClientPhone"],
            "email" => $validatedData["newClientEmail"],
            "secteuract" => $validatedData["newClientSecteur"],
            "zone_id" => $validatedData["selectedZone"],
        ]);

        // Envoyer l'e-mail de bienvenue



        session()->flash('message', 'Le client a été enregistré avec succès !');

        $this->reset('newClientName', 'newClientPrenom', 'newClientPhone', 'newClientEmail', 'newClientSecteur', 'selectedZone');
        Mail::to($newClient->email)->send(new ClientMail($newClient));
        event(new NewclientCreated($newClient));

    }





    public function showProp(Client $client)
    {
        $this->selectedClient = $client;
        $this->dispatch("ModalCreate", []);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }

    public function updateClient(Client $client)
    {
        $validated = $this->validate([
            "editClientName" => ["required", "max:20"],
            "editClientPrenom" => ["required", "max:50"],
            "editClientPhone" => ["required", "max:10","regex:/^[0-9]+$/"],
            "editClientEmail" => ["required", "max:50"],

        ], [
            "editClientName.required" => "Le champ du nom du client est requis.",
            "editClientName.max" => "Le nom du client ne peut pas dépasser :max caractères.",
            "editClientPrenom.required" => "Le champ du prenom du client est requis.",
            "editClientPrenom.max" => "Le prenom du client ne peut pas dépasser :max caractères.",
            "editClientPhone.required" => "Le champ du téléphone du client est requis.",
            "editClientPhone.max" => "Le téléphone du client ne peut pas dépasser :max caractères.",
            "editClientPhone.unique" => "le numero de téléphone est déjà utilisé.",
            "editClientPhone.regex" => "Le champ du téléphonene peut contenir que des chiffres.",
            "editClientEmail.required" => "Le champ email du client est requis.",
            "editClientEmail.max" => "L'email du client ne peut pas dépasser :max caractères.",
            "editClientEmail.unique" => "Email est déjà utilisé.",
            "editClientSecteur.required" => "Le champ du seacteur d'activité du client est requis.",
            "editClientSecteur.max" => "Le secteur d'activité du client ne peut pas dépasser :max caractères.",
        ]);

        $client->update([
        'nom' => $this->editClientName,
        'prenom' => $this->editClientPrenom,
        'telephone' => $this->editClientPhone,
        'email' => $this->editClientEmail,
        'secteuract' => $this->editClientSecteur,
          ]);
        session()->flash('message', "Le client a été mis à jour avec succès !");


    }
    public function updateZone($clientId, $zoneId)
    {
        $client = Client::findOrFail($clientId);
        $client->zone_id = $zoneId;
        $client->save();

    }

    public function showPropE(Client $client)
    {
        $editClient = $client;
        $this->editClientid = $editClient->id;
        $this->editClientName = $editClient->nom;
        $this->editClientPrenom = $editClient->prenom;
        $this->editClientPhone = $editClient->telephone;
        $this->editClientEmail = $editClient->email;
        $this->editClientSecteur= $editClient->secteuract;

        // Récupérer la client sélectionnée en fonction de l'ID de la client associée à la zone
        $selectedZone = Zone::find($editClient->zone_id);

        if ($selectedZone) {
            // Si la client est trouvée, définissez-la comme client sélectionnée
            $this->selectedZone = $selectedZone->id;
        } else {
            // Si la client n'est pas trouvée, définissez la client sélectionnée sur null ou une valeur par défaut
            $this->selectedZone = null; // ou toute autre valeur par défaut
        }

        $this->dispatch("showEditModal", [$client->nom,$client->prenom,$client->telephone,$client->email,$client->secteuract]);
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal", []);
    }

    public function showPropD(Client $client)
    {
        $this->selectedClient = $client;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteClient()
    {
        if ($this->selectedClient) {
            $this->selectedClient->delete();
            $this->dispatch('clientDeleted');
        }
    }

    public function showPropC(Client $client)
    {
        $this->selectedClient = $client;
        $this->dispatch("readModal", []);
    }

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal", []);
    }


}

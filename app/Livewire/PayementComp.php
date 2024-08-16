<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Statut;
use Livewire\Component;
use App\Models\Payement;
use App\Models\Livraison;

class PayementComp extends Component
{
    public $payement;
    public $montant;
    public $editpayementid;
    public $selectedPayement;
    public $showDeleteModal = false;
    public $search = "";
    public $loading = false;
    public $selectedClient;
    public $clientLivraisons = [];


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $this->loading = true;
        // Requête pour récupérer les employers en fonction de la recherche
        $payement= Payement::where('uuid', 'like', '%'.$this->search.'%')
                             ->paginate(10);


        $this->loading = false;

        $livraisons=Livraison::all();
        $clients=Client::all();
        $statuts=Statut::all();

        return view('livewire.payement.index', [
            'payements' => $payement,
            'livraisons'=> $livraisons,
            'clients'=> $clients,
            'statuts'=> $statuts,

        ])->extends("layouts.app")
          ->section("content");
    }

    public function showClientLivraisons($clientId)
        {
            $this->selectedClient = Client::find($clientId);
            if ($this->selectedClient) {
                $this->clientLivraisons = $this->selectedClient->livraisons; // Assurez-vous que la relation est définie dans le modèle Client
            }
            $this->dispatch('openModal');
        }

}

<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ContenudComp extends Component
{


     public $clientIp;
    public $client;

    public function mount(Client $client){
        $this->clientIp = $client;
        $this->client = Client::all();

        // return view('livewire.contenud');
    }

    public function render()
    {
        // Récupérer les informations du client sélectionné
        //$client = $this->selectedClient;
  return view('livewire.contenud', [
            "clients"=>Client::find("id")
        ])
            ->extends("layouts.app")
            ->section("content");
            dd(Client::find("id"));



    }





}

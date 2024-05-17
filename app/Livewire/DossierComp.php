<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class DossierComp extends Component
{
   

    public function render()
    {

        return view('livewire.dossier.index', [
            "clients" =>Client::all(),
            ""
        ])
        ->extends("layouts.app")
        ->section("content");



    }

    public function ddd()
    {
        // Récupérer les informations du client sélectionné
        //$client = $this->selectedClient;
  return view('livewire.contenud', [
            "selectedClient"=>Client::find("id")
        ])
            ->extends("layouts.app")
            ->section("content");




    }



}


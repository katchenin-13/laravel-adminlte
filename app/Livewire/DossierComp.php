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

        ])
        ->extends("layouts.app")
        ->section("content");



    }




}


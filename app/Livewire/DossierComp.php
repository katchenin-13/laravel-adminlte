<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class DossierComp extends Component
{
    public function render()
    {
        $clients = Client::all();
        return view('livewire.dossier', compact('clients'))
        ->extends("layouts.app")
        ->section("content");
    }
}

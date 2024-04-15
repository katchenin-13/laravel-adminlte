<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class ContenudComp extends Component
{
    public $selectedClient;

    public function mount()
    {
        // Sélectionner le premier client par défaut
        $this->selectedClient = Client::first();
    }

    public function render()
    {
        // Récupérer les informations du client sélectionné
        $client = $this->selectedClient;

        return view('livewire.contenud', compact('client'))
            ->extends("layouts.app")
            ->section("content");
    }
}

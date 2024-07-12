<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use App\Models\Livraison;

class ContenudComp extends Component
{


    public $contenuId;

    public function mount($id)
    {
        $this->contenuId = $id;

    }


    public function render()
    {
        $contenu = Client::find($this->contenuId);
        $livraisons = Livraison::where('client_id', $this->contenuId)->get();

        return view('livewire.contenud', [
            'contenu' => $contenu,
            'livraisons' => $livraisons,
        ])->extends("layouts.app")->section("content");
    }





}

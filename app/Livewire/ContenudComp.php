<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

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
  return view('livewire.contenud', [
         'contenu' => $contenu,
        ])
            ->extends("layouts.app")
            ->section("content");
            dd(Client::find("id"));



    }





}

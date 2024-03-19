<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class ClientComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newClientName = "";
    public $editClientName = "";
    public $editClientid ="";
    public $selectedClient;
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

        return view('livewire.client.index', ['clients' => Client::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }
}

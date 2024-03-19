<?php

namespace App\Livewire;

use App\Models\Colis;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class ColisComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newColisName = "";
    public $editColisName = "";
    public $editColisid ="";
    public $selectedColis;
    // public $colisCount;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    // public function mount()
    // {
    //    $this->colisCount = Colis::count();

    // }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $colis = Colis::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        // $clientCount = $this->clientCount;

        return view('livewire.colis.index', ['colis' => Colis::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }
}

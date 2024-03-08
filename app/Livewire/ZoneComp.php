<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ZoneComp extends Component
{


    use WithPagination;

    public $search = "";
    public $isAddZone = false;
    public $newZoneName = "";
    public $newValue = "";
    public $selectedZone;
   public $counter = 0;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $total = $communes->total();

        $communes = Commune::where("nom", "like", $searchCriteria)->latest()->paginate(5);

        return view('livewire.zone.index', compact('zones'))
            ->extends("layouts.app")
            ->section("content");
    }
}

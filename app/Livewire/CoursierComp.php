<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Coursier;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class CoursierComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newCoursierName = "";
    public $editCoursierName = "";
    public $editCoursierid ="";
    public $selectedCoursier;
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

        $coursiers = Coursier::where("nom", "like", $searchCriteria)->latest()->paginate(10);

        // $coursierCount = $this->coursierCount;

        return view('livewire.coursier.index', ['coursiers' => Coursier::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }
}

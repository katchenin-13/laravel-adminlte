<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Coursier;

use App\Models\Coursuser;
use App\Mail\InfoCoursier;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class CoursuserComp extends Component
{
    use WithPagination;


    public $search = "";
    public $coursuser;
    public $editCoursusersid="";
    public $selectedCoursiers;
    public $selectedUser;
    public $selectedCoursusers;
    public $coursuserCount
;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->coursuserCount= Coursuser::count();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $coursuser = Coursuser::where('uuid', 'like', '%'.$this->search.'%')
        ->paginate(10);
        // dd("all");
        $coursiers = Coursier::all();
        $users = User::all();

        return view('livewire.coursuser.index', [
            'coursiers'=> $coursiers,
            'users'=>$users,
            'coursusers'=>$coursuser
            ])
                ->extends("layouts.app")
                ->section("content");
    }

    public function addNewCoursuser()
    {
        // Validation des données
        $validatedData = $this->validate([
            "selectedCoursiers" => "required",
            "selectedUser" => "required",
        ], [
            "selectedCoursiers.required" => "Veuillez sélectionner le coursier.",
            "selectedUser.required" => "Veuillez sélectionner le compte du client.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        $coursuser = Coursuser::create([
            "uuid" => $uuid,
            "coursier_id" => $validatedData["selectedCoursiers"],
            "user_id" => $validatedData["selectedUser"],
        ]);

        $coursier = Coursier::find($validatedData["selectedCoursiers"]);
        $user = User::find($validatedData["selectedUser"]);



        // Message flash pour confirmation
        session()->flash('message', 'Le coursier a été enregistré avec succès et un e-mail a été envoyé !');
        Mail::to($user->email)->send(new InfoCoursier($coursier, $user));
        // Réinitialisation des champs
        $this->reset('selectedUser', 'selectedCoursiers');

    }

    // public function availableUsers($excludedId)
    // {
    //     // Validation de l'entrée
    //     if (!is_numeric($excludedId)) {
    //         return response()->json(['error' => 'Invalid ID'], 400);
    //     }

    //     // Récupérer les utilisateurs sauf celui avec l'ID exclu
    //     $users = User::where('id', '!=', $excludedId)
    //                  ->select('id', 'name')
    //                  ->get();

    //     return response()->json($users);
    // }



    public function showProp(Coursuser $coursuser)
    {
        $this->selectedCoursusers = $coursuser;
        $this->dispatch("ModalCreate", []);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }

    public function updateCoursuser(Coursuser $coursuser)
    {
        $validated = $this->validate([
            "selectedCoursiers" => "required",
            "selectedUser" => "required",

       ], [

            "selectedCoursiers.required" => "Veuillez sélectionner le coursier.",
            "selectedUser.required" => "Veuillez sélectionner le compte.",
       ]);

    }

    public function selectedCoursiers($coursuserId, $coursierId)
    {
        $coursuser = Coursuser::findOrFail($coursuserId);
        $coursuser->coursier_id = $coursierId;
        $coursuser->save();

    }

    public function updateUser($coursuserId, $userId)
    {
        $coursuser = Coursuser::findOrFail($coursuserId);
        $coursuser->user_id = $userId;
        $coursuser->save();

    }

    public function showPropC(Coursuser $coursuser)
    {
        $this->selectedCoursusers = $coursuser;

        $this->dispatch("readModal", []);
    }

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal", []);
    }


    public function showPropE(Coursuser $coursuser)

    {

        $editCoursuser = $coursuser;
        function getModelId($model, $id) {
            $instance = $model::find($id);
            return $instance ? $instance->id : null;
        }

        $this->selectedCoursiers = getModelId(Coursier::class, $editCoursuser->coursier_id);
        $this->selectedUser = getModelId(User::class, $editCoursuser->User_id);

        $this->dispatch("showEditModal");
    }

    public function showPropD(Coursuser $coursuser)
    {
        $this->selectedCoursusers = $coursuser;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteCoursuser()
    {
        if ($this->selectedCoursusers) {
            $this->selectedCoursusers->delete();
            $this->dispatch('coursuserDeleted');
        }
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal", []);
    }


    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeDeleteModal", []);
    }
}

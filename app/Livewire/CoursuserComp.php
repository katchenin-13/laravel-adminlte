<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Manuser;
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
    public $editCoursusersid = "";
    public $selectedCoursiers;
    public $selectedUser;
    public $selectedCoursusers;
    public $coursuserCount;
    public $showDeleteModal = false;

    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->coursuserCount = Coursuser::count();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        // Récupérer les IDs des coursiers et utilisateurs déjà associés
        $usedCoursiersIds = Coursuser::pluck('coursier_id')->toArray();
        $usedUserIdsInCoursuser = Coursuser::pluck('user_id')->toArray();

        // Récupérer les utilisateurs déjà associés dans Manuser
        $usedUserIdsInManuser = Manuser::pluck('user_id')->toArray();

        // Fusionner les IDs d'utilisateurs utilisés
        $usedUserIds = array_merge($usedUserIdsInCoursuser, $usedUserIdsInManuser);

        // Filtrer les coursiers et utilisateurs disponibles
        $coursiers = Coursier::whereNotIn('id', $usedCoursiersIds)->get();
        $users = User::whereNotIn('id', $usedUserIds)->get();

        // Récupérer les Coursuser avec possibilité de recherche
        $coursuser = Coursuser::with(['user', 'coursier'])
            ->where('uuid', 'like', $searchCriteria)
            ->paginate(10);

        return view('livewire.coursuser.index', [
            'coursiers' => $coursiers,
            'users' => $users,
            'coursusers' => $coursuser,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewCoursuser()
    {
        $validatedData = $this->validate([
            "selectedCoursiers" => "required",
            "selectedUser" => "required",
        ], [
            "selectedCoursiers.required" => "Veuillez sélectionner le coursier.",
            "selectedUser.required" => "Veuillez sélectionner le compte du client.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        $NewCoursier = Coursuser::create([
            "uuid" => $uuid,
            "coursier_id" => $validatedData["selectedCoursiers"],
            "user_id" => $validatedData["selectedUser"],
        ]);

        session()->flash('message', 'Le coursier a été enregistré avec succès!');
        $this->reset(['selectedUser', 'selectedCoursiers']);
        // Mail::to($NewCoursier->email)->send(new InfoCoursier($NewCoursier));

    }

    // public function getAvailableOptions()

        // {
        //     $usedCoursiersIds = Coursuser::pluck('coursier_id')->toArray();
        //     $usedUserIds = Coursuser::pluck('user_id')->toArray();
        //     $availableCoursiers = Coursier::whereNotIn('id', $usedCoursiersIds)->get();
        //     $availableUsers = User::whereNotIn('id', $usedUserIds)->get();

        //     return response()->json([
        //         'coursiers' => $availableCoursiers,
        //         'users' => $availableUsers,
        //     ]);
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

        // Update the coursuser properties
        $coursuser->update([
            "coursier_id" => $validated["selectedCoursiers"],
            "user_id" => $validated["selectedUser"],
        ]);

        session()->flash('message', 'Le coursier a été mis à jour avec succès!');
        $this->closeEditModal();
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
        $this->selectedCoursusers = $coursuser;
        $this->selectedCoursiers = $coursuser->coursier_id;
        $this->selectedUser = $coursuser->user_id;

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
            session()->flash('message', 'Le coursier a été supprimé avec succès!');
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

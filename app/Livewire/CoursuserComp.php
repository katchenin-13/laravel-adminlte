<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Coursier;
use App\Models\Coursuser;
use Livewire\WithPagination;

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

        $coursuser = Coursuser::with(['user', 'coursier'])
            ->where('uuid', 'like', $searchCriteria)
            ->paginate(10);

        // Vérifiez si les utilisateurs et les coursiers sont bien chargés
        // foreach ($coursuser as $cu) {
        //     dd($cu->user, $cu->coursier);
        // }
        foreach ($coursuser as $cu) {
            // Pour voir les informations de chaque utilisateur et coursier
            dd($cu->user->name, $cu->coursier->name);
        }

        $coursiers = Coursier::all();
        $users = User::all();

        return view('livewire.coursuser.index', [
            'coursiers' => $coursiers,
            'users' => $users,
            'coursusers' => $coursuser
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

        Coursuser::create([
            "uuid" => $uuid,
            "coursier_id" => $validatedData["selectedCoursiers"],
            "user_id" => $validatedData["selectedUser"],
        ]);



        session()->flash('message', 'Le coursier a été enregistré avec succès!');
        $this->reset(['selectedUser', 'selectedCoursiers']);
    }

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
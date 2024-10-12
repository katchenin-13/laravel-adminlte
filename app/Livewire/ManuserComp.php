<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Manager;
use App\Models\Manuser;
use Livewire\Component;
use App\Models\Coursuser;
use Livewire\WithPagination;

class ManuserComp extends Component
{
    use WithPagination;


    public $search = "";
    public $manuser;
    public $editManusersid="";
    public $selectedManager;
    public $selectedUser;
    public $selectedManusers;
    public $manuserCount
;
    public $showDeleteModal="false";



    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->manuserCount= Manuser::count();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        // Récupérer les IDs des managers et utilisateurs déjà associés
        $usedManagersIds = Manuser::pluck('manager_id')->toArray();
        $usedUserIdsInManuser = Manuser::pluck('user_id')->toArray();

        // Récupérer les utilisateurs déjà associés dans Coursuser
        $usedUserIdsInCoursuser = Coursuser::pluck('user_id')->toArray();

        // Fusionner les IDs d'utilisateurs utilisés
        $usedUserIds = array_merge($usedUserIdsInManuser, $usedUserIdsInCoursuser);

        // Filtrer les manage et utilisateurs disponibles
        $managers = Manager::whereNotIn('id', $usedManagersIds)->get();
        $users = User::whereNotIn('id', $usedUserIds)->get();

        // Récupérer les Manuser avec possibilité de recherche
        $manuser = Manuser::with(['user', 'manager'])
            ->where('uuid', 'like', $searchCriteria)
            ->paginate(10);

        return view('livewire.manuser.index', [
            'managers' => $managers,
            'users' => $users,
            'manusers' => $manuser,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewManuser()
    {
        $validatedData = $this->validate([
             "selectedManager" => "required",
             "selectedUser" => "required",
        ], [

            "selectedManager.required" => "Veuillez sélectionner le manager.",
            "selectedUser.required" => "Veuillez sélectionner le compte du client.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        Manuser::create([
            "uuid" => $uuid,
            "manager_id" => $validatedData["selectedManager"],
            "user_id" => $validatedData["selectedUser"],
        ]);
        session()->flash('message', 'Le compte a été mise à jour avec succès!');
        $this->closeEditModal();
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



    public function showProp(Manuser $manuser)
    {
        $this->selectedManusers = $manuser;
        $this->dispatch("ModalCreate", []);
    }

    public function closeModal()
    {
        $this->dispatch("closeModal");
    }

    public function updateManuser(Manuser $manuser)
    {
        $validated = $this->validate([
            "selectedManager" => "required",
            "selectedUser" => "required",

       ], [

            "selectedManager.required" => "Veuillez sélectionner le manager.",
            "selectedUser.required" => "Veuillez sélectionner le compte.",
       ]);

    }

    public function selectedManuser($manuserId, $managerId)
    {
        $manuser = Manuser::findOrFail($manuserId);
        $manuser->manager_id = $managerId;
        $manuser->save();

    }

    public function updateUser($manuserId, $userId)
    {
        $manuser = Manuser::findOrFail($manuserId);
        $manuser->user_id = $userId;
        $manuser->save();

    }

    public function showPropC(Manuser $manuser)
    {
        $this->selectedManusers = $manuser;

        $this->dispatch("readModal", []);
    }

    public function closereadModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closereadModal", []);
    }


    public function showPropE(Manuser $manuser)
    {
        $this->selectedManusers = $manuser;
        $this->selectedManager = $manuser->manager_id;
        $this->selectedUser = $manuser->user_id;

        $this->dispatch("showEditModal");
    }

    public function showPropD(Manuser $manuser)
    {
        $this->selectedManusers = $manuser;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteManuser()
    {
        if ($this->selectedManusers) {
            $this->selectedManusers->delete();
            $this->dispatch('manuserDeleted');
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

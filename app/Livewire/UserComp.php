<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newUserName = "";
    public $newUserEmail = "";
    public $newUserPassword = "";
    public $editUserName = "";
    public $editUserEmail = ""; // Changement de 'editUserGmail' à 'editUserEmail'
    public $editUserPassword = "";
    public $editRole = "";
    public $editUserid = "";
    public $selectedUser;
    public $userCount;
    public $roles;
    public $permissions;
    public $selectedRole;

    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->userCount = User::count();
        $this->roles = Role::all();
    }


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $users = User::where('name', 'like', $searchCriteria)
            ->orWhere('email', 'like', $searchCriteria)
            ->orWhere('uuid', 'like', $searchCriteria)
            ->paginate(10);

        return view('livewire.users.index', [
            'users' => $users,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewUser()
    {
        $validated = $this->validate([
            "newUserName" => "required|max:20",
            "newUserEmail" => "required|max:50|unique:users,email",
            "newUserPassword" => "required|min:6", // Changement de 'max:6' à 'min:6'
            'selectedRole' => 'required',
        ], [
            "newUserName.required" => "Le champ du nom de l'utilisateur est requis.",
            "newUserName.max" => "Le nom de l'utilisateur ne peut pas dépasser :max caractères.",
            "newUserEmail.required" => "Le champ email de l'utilisateur est requis.",
            "newUserEmail.max" => "L'email de l'utilisateur ne peut pas dépasser :max caractères.",
            "newUserEmail.unique" => "L'email est déjà utilisé.",
            "newUserPassword.required" => "Le mot de passe de l'utilisateur est requis.",
            "newUserPassword.min" => "Le mot de passe de l'utilisateur doit avoir au moins :min caractères.",
        ]);

        $uuid = Uuid::uuid4()->toString();

        $newUser = User::create([
            "uuid" => $uuid,
            "name" => $validated["newUserName"],
            "email" => $validated["newUserEmail"],
            "password" => bcrypt($validated["newUserPassword"])
        ]);

        $newUser->assignRole($this->selectedRole); // Changement de $user à $newUser

        session()->flash('message', "L'utilisateur a été créé avec succès !");
        $this->reset(['newUserName', 'newUserEmail', 'newUserPassword', 'selectedRole']);
    }

    public function updateUser(User $user)
    {
        $validated = $this->validate([
            "editUserName" => "required|max:20",
            "editUserEmail" => ["required","max:50"], // Changement de 'editUserGmail' à 'editUserEmail'
            "editUserPassword" => "required|min:6", // Changement de 'max:6' à 'min:6'
            "editRole" => "required|exists:roles,name"
        ], [
            "editUserName.required" => "Le champ du nom de l'utilisateur est requis.",
            "editUserName.max" => "Le nom de l'utilisateur ne peut pas dépasser :max caractères.",
            "editUserEmail.required" => "Le champ email de l'utilisateur est requis.",
            "editUserEmail.max" => "L'email de l'utilisateur ne peut pas dépasser :max caractères.",
            "editUserEmail.unique" => "L'email est déjà utilisé.",
            "editUserPassword.required" => "Le mot de passe de l'utilisateur est requis.",
            "editUserPassword.min" => "Le mot de passe de l'utilisateur doit avoir au moins :min caractères.",
            "editRole.required" => "Veuillez attribuer un rôle à l'utilisateur."
        ]);

        $user->update([
            'name' => $validated['editUserName'],
            'email' => $validated['editUserEmail'],
            'password' => bcrypt($validated['editUserPassword']),
        ]);

        session()->flash('message', "L'utilisateur a été mis à jour avec succès !");

        // dd($user);
    }

    public function updatedSelectedRole($role)
    {
        if ($role) {
            $roleModel = Role::findByName($role);
            $this->permissions = $roleModel ? $roleModel->permissions : collect();
        } else {
            $this->permissions = collect();
        }


    }

    // Méthodes de gestion des modals et suppression de l'utilisateur
    public function showCreatedProp(User $user)
    {
        $this->selectedUser = $user;
        $this->dispatch("CreatModalU", []);
    }

    public function showProp(User $user)
    {
        $this->selectedUser = $user;
        $this->dispatch("readModal", []);
    }

    public function showEditedProp(User $user)
    {
        $this->editUserid = $user->id;
        $this->editUserName = $user->name;
        $this->editUserEmail = $user->email;

        $this->dispatch("EditModal", [$user->name,$user->role]);
    }

    public function showPropD(User $user)
    {
        $this->selectedUser = $user;
        $this->dispatch("showDeleteModal", []);
    }

    public function deleteUser()
    {
        if ($this->selectedUser) {
            $this->selectedUser->delete();
            $this->dispatch('userDeleted');
        }
    }

    public function closeModal()
    {
        $this->dispatch("closeModal", []);
    }

    public function closeEditModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeEditModal", []);
    }

    public function closeUserModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeUserModal", []);
    }
}

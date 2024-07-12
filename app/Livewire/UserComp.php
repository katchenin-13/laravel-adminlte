<?php

namespace App\Livewire;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;

class UserComp extends Component
{
    use WithPagination;

    public $search = "";
    public $newUserName = "";
    public $newUserEmail = "";
    public $newUserPassword = "";
    public $editUserName = "";
    public $editUserGmail = "";
    public $editUserPassword = "";
    public $editRole = "";
    public $editUserid = "";
    public $selectedUser;
    public $userCount;
    public $role;

    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        // Utilisation de la méthode statique count() du modèle User pour compter les utilisateurs
        $this->userCount = User::count();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        // Utilisation de $searchCriteria pour filtrer les utilisateurs par ID ou autre critère
        $users = User::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orWhere('numero_telephone', 'like', '%'.$this->search.'%')
        ->paginate(10);
        // $roles = Role::pluck('name');
        return view('livewire.users.index', [
        'users' => $users,
        // 'roles' => $roles,
        ])
            ->extends("layouts.app")
            ->section("content");
    }

    public function addNewUser()
    {
        $validated = $this->validate([
            "newUserName" => "required|max:20",
            "newUserEmail" => "required|max:50|unique:users,email",
            "newUserPassword" => "required|max:6",
            "role" => "required|exists:roles,name"
        ], [
            "newUserName.required" => "Le champ du nom de l'utilisateur est requis.",
            "newUserName.max" => "Le nom de l'utilisateur ne peut pas dépasser :max caractères.",
            "newUserEmail.required" => "Le champ email de l'utilisateur est requis.",
            "newUserEmail.max" => "L'email de l'utilisateur ne peut pas dépasser :max caractères.",
            "newUserEmail.unique" => "L'email est déjà utilisé.",
            "newUserPassword.required" => "Le mot de passe de l'utilisateur est requis.",
            "newUserPassword.max" => "Le mot de passe de l'utilisateur ne peut pas dépasser :max caractères.",
            "role.required" => "Veuillez attribuer un rôle à l'utilisateur."
        ]);

        $uuid = Uuid::uuid4()->toString();

        $newUser = User::create([
            "uuid" => $uuid,
            "name" => $validated["newUserName"],
            "email" => $validated["newUserEmail"],
            "password" => bcrypt($validated["newUserPassword"]) // Utilisation de bcrypt pour hasher le mot de passe
        ]);

        $role = Role::where('name', $validated['role'])->first();
        $newUser->assignRole($role);

        session()->flash('message', "L'utilisateur a été créé avec succès !");
        $this->reset(['newUserName', 'newUserEmail', 'newUserPassword', 'role']);
    }


    public function updateUser(User $user)
    {
        $validated = $this->validate([
            "editUserName" => "required|max:20",
            "editUserGmail" => "required|max:50|unique:users,email," . $user->id,
            "editUserPassword" => "required|max:6",
            "editRole" => "required|exists:roles,name"
        ], [
            "editUserName.required" => "Le champ du nom de l'utilisateur est requis.",
            "editUserName.max" => "Le nom de l'utilisateur ne peut pas dépasser :max caractères.",
            "editUserGmail.required" => "Le champ email de l'utilisateur est requis.",
            "editUserGmail.max" => "L'email de l'utilisateur ne peut pas dépasser :max caractères.",
            "editUserGmail.unique" => "L'email est déjà utilisé.",
            "editUserPassword.required" => "Le mot de passe de l'utilisateur est requis.",
            "editUserPassword.max" => "Le mot de passe de l'utilisateur ne peut pas dépasser :max caractères.",
            "editRole.required" => "Veuillez attribuer un rôle à l'utilisateur."
        ]);

        $user = User::findOrFail($user->id);
        $user->name = $validated['editUserName'];
        $user->email = $validated['editUserGmail'];
        $user->password = bcrypt($validated['editUserPassword']);
        $user->save();

        $role = Role::where('name', $validated['editRole'])->first();
        $user->syncRoles([$role->name]);

        session()->flash('message', "L'utilisateur a été mis à jour avec succès !");
        $this->reset(['editUserName', 'editUserGmail', 'editUserPassword', 'editRole']);
    }

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
        $this->editUserGmail = $user->email;

        $this->dispatch("EditModal", [$user->name]);
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

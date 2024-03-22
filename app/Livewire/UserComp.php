<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class UserComp extends Component
{


    use WithPagination;

    public $search = "";
    public $newUserName = "";
    public $newUserEmail= "";
    public $newUserPassword = "";
    public $editUserName = "";
    public $editUserGmail = "";
    public $editUserPassword= "";
    public $editUserid ="";
    public $selectedUser;



    protected $paginationTheme = "bootstrap";


    public function render()
    {
        Carbon::setLocale("fr");

        $searchCriteria = "%" . $this->search . "%";

        $users = User::where("id", "like", $searchCriteria)->latest()->paginate(10);


        return view('livewire.users.index', ['users' => User::latest()->paginate(10)])
            ->extends("layouts.app")
            ->section("content");
    }


    public function addNewUser()
    {
        $validated = $this->validate([
            "newUserName" => "required|max:20",
            "newUserEmail" => "required|max:50|unique:users,email",
            "newUserPassword" => "required|max:6"  ], [
            "newUserName.required" => "Le champ du nom du user est requis.",
            "newUserName.max" => "Le nom du user ne peut pas dépasser :max caractères.",
            "newUserEmail.required" => "Le champ email du user est requis.",
            "newUserEmail.max" => "L'email du user ne peut pas dépasser :max caractères.",
            "newUserEmail.unique" => "l'email  déjà utilisé.",
            "newUserPassword.required" => "Le mot de passe du user est requis.",
            "newUserPassword.max" => "Le password de la user ne peut pas dépasser :max caractères.",
        ]);

        User::create(["name" => $validated["newUserName"],
                      "email"=>$validated["newUserEmail"],
                     "password" => $validated["newUserPassword"]]);
        session()->flash('message', 'Le nom de la user a été enregistré avec succès!');
    }



    public function updateUser(User $user)
    {
        $validated = $this->validate([
            "editUserName" => ["required", "max:20"],
            "editUserGmail" => ["required", "max:50|unique:users,email"],
            "editUserPassword" => ["required", "max:6"],
        ], [
            "editUserName.required" => "Le champ du nom du user est requis.",
            "editUserName.max" => "Le nom de la user ne peut pas dépasser :max caractères.",
            "newUserName.required" => "Le champ du nom du user est requis.",
            "editUserGmail.required" => "Le champ email du user est requis.",
            "editUserGmail.max" => "L'email du user ne peut pas dépasser :max caractères.",
            "editUserGmail.unique" => "l'email  déjà utilisé.",
            "editUserPassword.required" => "Le mot de passe du user est requis.",
            "editUserPassword.max" => "Le password de la user ne peut pas dépasser :max caractères.",
        ]);

        $users = User::findOrFail($user->id);
        $users->nom = $this->editUserName;
        $users->email = $this->editUserGmail;
        $users->password = $this->editUserPassword;
        $result = $users->save();
        $users->name = "";
        $users->email = "";
        $users->password = "";
         
    }
    

    public function showCreatedProp(User $user)
    {
        $this->selectedUser = $user;
        $this->dispatch("CreatModalU", []);
    }




    public function showProp(User $user)
    {

        $editUser = $user;
        $this->editUserid = $editUser ->id;
        $this->editUserName = $editUser ->name;


        $this->dispatch("ShowModal", [$user->name,$user->email,$user->password]);
        dd('bonjour');
    }
   

    public function showEditedProp(User $user)
    {

        $editUser = $user;
        $this->editUserid = $editUser ->id;
        $this->editUserName = $editUser ->name;


        $this->dispatch("EditModal", [$user->name]);
    }

    public function showDeletedProp(User $user)
    {

        $editUser = $user;
        $this->editUserid = $editUser ->id;
        $this->editUserName = $editUser ->name;


        $this->dispatch("DeleteModal", [$user->name]);
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

    public function closeDeleteModal()
    {
        $this->resetErrorBag();
        $this->dispatch("closeDeleteModal", []);
    }

    // public function showDeletePrompt($nom, $id)
    // {
    //     $this->dispatch("showConfirmMessage", ["message" => [
    //         "text" => "Vous êtes sur le point de supprimer '$nom' de la liste des propriétés d'articles. Voulez-vous continuer?",
    //         "title" => "Êtes-vous sûr de continuer?",
    //         "type" => "warning",
    //         "data" => [
    //             "propriete_id" => $id
    //         ]
    //     ]]);
    // }
}

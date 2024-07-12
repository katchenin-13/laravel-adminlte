<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::find(1);

        if (!$user) {
            $this->command->error("L'utilisateur avec l'ID 1 n'existe pas.");
            return;
        }


        $role = Role::where('name', 'superadmin')->first();

        // Vérifier si le rôle 'superadmin' existe
        if (!$role) {
            $this->command->error("Le rôle 'superadmin' n'existe pas.");
            return;
        }

        // Attribuer le rôle 'superadmin' à l'utilisateur
        $user->assignRole($role);

        $this->command->info("Le rôle 'superadmin' a été attribué à l'utilisateur avec succès.");


    }

}


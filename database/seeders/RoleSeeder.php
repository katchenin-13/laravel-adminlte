<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();

        try {
            // Création des rôles

            $adminManager = Role::create(['name' => 'manager']);
            $coursierRole = Role::create(['name' => 'coursier']);

            // Création des permissions
            $addPermission = Permission::create(['name' => 'add']);
            $deletePermission = Permission::create(['name' => 'delet']);
            $editPermission = Permission::create(['name' => 'edit']);
            $readPermission = Permission::create(['name' => 'read']);
            $modifierPermission = Permission::create(['name' => 'modifier']);


            // Attribution des permissions aux rôles
            $adminManager->syncPermissions([$addPermission->id, $readPermission->id, $deletePermission->id, $editPermission->id, $modifierPermission->id]);
            $coursierRole->syncPermissions([$addPermission->id, $readPermission->id, $editPermission->id]);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}

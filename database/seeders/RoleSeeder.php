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

            $adminRole = Role::create(['name' => 'admin']);
            $coursierRole = Role::create(['name' => 'coursier']);

            // Création des permissions
            $listePermission = Permission::create(['name' => 'liste']);
            $addPermission = Permission::create(['name' => 'add']);
            $deletePermission = Permission::create(['name' => 'delet']);
            $editPermission = Permission::create(['name' => 'edit']);
            $readPermission = Permission::create(['name' => 'read']);
            $modifierPermission = Permission::create(['name' => 'modifier']);
            $listecPermission = Permission::create(['name' => 'listec']);
            $addcPermission = Permission::create(['name' => 'addc']);
            $deletecPermission = Permission::create(['name' => 'deletc']);
            $editcPermission = Permission::create(['name' => 'editc']);
            $readcPermission = Permission::create(['name' => 'readc']);


            // Attribution des permissions aux rôles
            $adminRole->syncPermissions([$listePermission->id, $addPermission->id, $readPermission->id, $deletePermission->id, $editPermission->id, $modifierPermission->id]);
            $coursierRole->syncPermissions([$listecPermission->id, $addcPermission->id, $readcPermission->id, $deletecPermission->id, $editcPermission->id]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}

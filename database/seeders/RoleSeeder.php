<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin=Role::create(['name' => 'superadmin']);
        $admin=Role::create(['name' => 'admin']);
        $coursier=Role::create(['name' => 'coursier']);

        $allPermissions = Permission::all();
        $superadmin->givePermissionTo($allPermissions);
        $admin->givePermissionTo($allPermissions);
        $coursier->givePermissionTo('view');
    }

}

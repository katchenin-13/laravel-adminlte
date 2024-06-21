<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $superadminRole = Role::create(['name' => 'superadmin']);

                $permissions = Permission::all();

                $superadminRole->syncPermissions($permissions->pluck('id')->toArray());
    }
}

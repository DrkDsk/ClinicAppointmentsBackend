<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $receptionist = Role::create(['name' => 'receptionist']);
        Role::create(['name' => 'doctor']);
        Role::create(['name' => 'patient']);

        $admin->givePermissionTo(Permission::all());
        $receptionist->givePermissionTo(['view appointments', 'edit appointments']);
    }
}

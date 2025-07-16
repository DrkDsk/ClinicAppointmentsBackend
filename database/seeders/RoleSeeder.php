<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Classes\Const\Role as RoleClass;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => RoleClass::ADMIN]);
        $receptionist = Role::create(['name' => RoleClass::RECEPTIONIST]);
        Role::create(['name' => RoleClass::DOCTOR]);
        Role::create(['name' => RoleClass::PATIENT]);

        $admin->givePermissionTo(Permission::all());
        $receptionist->givePermissionTo(['view appointments', 'edit appointments']);
    }
}

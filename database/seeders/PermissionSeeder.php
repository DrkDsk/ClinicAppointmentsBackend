<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Permission::create(['name' => 'view appointments']);
        Permission::create(['name' => 'edit appointments']);
        Permission::create(['name' => 'delete appointments']);
        Permission::create(['name' => 'manage users']);
    }
}

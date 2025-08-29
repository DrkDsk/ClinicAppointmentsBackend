<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            PersonSeeder::class,
            TypeAppointmentSeeder::class,
            AppointmentSeeder::class,
            PaymentSeeder::class,
            TreatmentSeeder::class,
            TreatmentPatientSeeder::class,
        ]);
    }
}

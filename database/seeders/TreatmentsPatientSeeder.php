<?php

namespace Database\Seeders;

use App\Models\TreatmentsPatient;
use Illuminate\Database\Seeder;

class TreatmentsPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TreatmentsPatient::factory()->count(100)->create();
    }
}

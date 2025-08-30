<?php

namespace Database\Seeders;

use App\Models\TreatmentsAppointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentsAppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TreatmentsAppointment::factory()->count(100)->create();
    }
}

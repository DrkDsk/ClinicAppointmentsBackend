<?php

namespace Database\Seeders;

use App\Models\PaymentsTreatmentsAppointment;
use Illuminate\Database\Seeder;

class PaymentsTreatmentsAppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentsTreatmentsAppointment::factory()->count(100)->create();
    }
}

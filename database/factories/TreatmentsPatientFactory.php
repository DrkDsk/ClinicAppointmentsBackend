<?php

namespace Database\Factories;

use App\Classes\Const\TreatmentStatus;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TreatmentPatient>
 */
class TreatmentsPatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $appointment = Appointment::inRandomOrder()->first();
        $patientId = $appointment->patient_id;
        $doctorId = $appointment->doctor_id;

        return [
            'treatment_id' => Treatment::inRandomOrder()->first()->id ?? Treatment::factory(),
            'doctor_id' => $doctorId,
            'patient_id' => $patientId,
            'start_date' => fake()->dateTimeBetween('now', '+1 year'),
            'end_date' => fake()->dateTimeBetween('now', '+1 year'),
            'status' => fake()->randomElement(TreatmentStatus::all()),
            'observations' => fake()->sentence(),
            'coast_total' => fake()->numberBetween(100, 1000)
        ];
    }
}

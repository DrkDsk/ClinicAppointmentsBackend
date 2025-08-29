<?php

namespace Database\Factories;

use App\Classes\Const\TreatmentStatus;
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
        return [
            'treatment_id' => Treatment::inRandomOrder()->first()->id ?? Treatment::factory(),
            'doctor_id' => Doctor::inRandomOrder()->first()->id ?? Doctor::factory(),
            'patient_id' => Patient::inRandomOrder()->first()->id ?? Patient::factory(),
            'start_date' => fake()->dateTimeBetween('now', '+1 year'),
            'end_date' => fake()->dateTimeBetween('now', '+1 year'),
            'status' => fake()->randomElement(TreatmentStatus::all()),
            'observations' => fake()->sentence(),
            'coast_total' => fake()->numberBetween(100, 1000)
        ];
    }
}

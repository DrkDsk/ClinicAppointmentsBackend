<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\TreatmentsAppointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentsTreatmentsAppointment>
 */
class PaymentsTreatmentsAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_id' => Payment::inRandomOrder()->first()->id,
            'treatment_appointment_id' => TreatmentsAppointment::inRandomOrder()->first()->id,
            'amount' => fake()->numberBetween(100, 1000)
        ];
    }
}

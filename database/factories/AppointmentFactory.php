<?php

namespace Database\Factories;

use App\Classes\Const\AppointmentsStatus;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\TypeAppointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'scheduled_at' => $this->faker->dateTimeBetween('now', '+1 year'),
            'patient_id' => Patient::inRandomOrder()->first()->id ?? Patient::factory(),
            'doctor_id' => Doctor::inRandomOrder()->first()->id ?? Doctor::factory(),
            'type_appointment_id' => TypeAppointment::inRandomOrder()->first()->id ?? TypeAppointment::factory(),
            'status' => $this->faker->randomElement(AppointmentsStatus::all()),
            'note' => $this->faker->optional()->sentence(8),
        ];
    }
}

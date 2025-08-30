<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\TreatmentsAppointment;
use App\Models\TreatmentsPatient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TreatmentsAppointment>
 */
class TreatmentsAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $treatmentPatient = TreatmentsPatient::inRandomOrder()->first();
        $patientId = $treatmentPatient->patient_id;
        $appointment = Appointment::where('patient_id', $patientId)->first();

        return [
            'treatment_patient_id' => $treatmentPatient->id,
            'appointment_id' => $appointment->id,
            'notes' => fake()->sentence()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Classes\Const\TreatmentStatus;
use App\Models\Appointment;
use App\Models\Treatment;
use App\Models\TreatmentsPatient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TreatmentsPatient>
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

    public function configure(): TreatmentsPatientFactory|Factory
    {
        return $this->afterCreating(function (TreatmentsPatient $treatmentsPatient) {

            $appointment = Appointment::where([
                'doctor_id' => $treatmentsPatient->doctor_id,
                'patient_id' => $treatmentsPatient->patient_id
            ])->first();

            $treatmentsPatient->treatmentAppointments()->create([
                'appointment_id' => $appointment->id ?? null,
                'notes' => fake()->sentence()
            ]);
        });
    }
}

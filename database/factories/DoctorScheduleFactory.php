<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor = Doctor::inRandomOrder()->first();
        $startTime = Carbon::parse(fake()->time());

        return [
            'doctor_id' => $doctor->id ?? Doctor::factory(),
            'weekday' => fake()->randomElement([1, 2, 3, 4, 5, 6, 7]),
            'start_time' => $startTime->format('H:i'),
            'end_time' =>$startTime->addHours(6)->format('H:i'),
        ];
    }
}

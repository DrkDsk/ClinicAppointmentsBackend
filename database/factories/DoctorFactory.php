<?php

namespace Database\Factories;

use App\Classes\Specialty;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'birthday' => $this->faker->date('Y-m-d', '2005-01-01'),
            'specialty' => fake()->randomElement(Specialty::all())
        ];
    }
}

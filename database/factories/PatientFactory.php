<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'birthday' => $this->faker->date('Y-m-d', '2005-01-01'),
            'phone_number' => $this->faker->phoneNumber(),
            'weight' => $this->faker->optional()->numberBetween(40, 120),
            'height' => $this->faker->optional()->numberBetween(140, 210),
        ];
    }
}

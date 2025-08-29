<?php

namespace Database\Factories;

use App\Classes\Const\TreatmentsCatalog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatment>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomPlan = fake()->randomElement(TreatmentsCatalog::TREATMENTS);

        return [
            'plan' => $randomPlan['nombre'],
            'category' => $randomPlan['categoria'],
            'description' => fake()->sentence(1),
            'cost_basis' => fake()->numberBetween(100, 1000)
        ];
    }
}

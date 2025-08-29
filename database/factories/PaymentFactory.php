<?php

namespace Database\Factories;

use App\Classes\Const\PaymentMethods;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->numberBetween(100, 2000),
            'method' => fake()->randomElement(PaymentMethods::all()),
            'date' => fake()->dateTimeBetween('now', '+1 year')
        ];
    }
}

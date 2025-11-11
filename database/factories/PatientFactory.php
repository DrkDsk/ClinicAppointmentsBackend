<?php

namespace Database\Factories;

use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Patient>
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
        $height = fake()->optional()->randomFloat(2, 30, 99.99);
        $heightType = $height !== null ? HeightMeasureEnum::CENTIMETER : null;
        $weight = fake()->optional()->randomFloat(2, 30, 99.99);
        $weightType = $weight !== null ? WeightMeasureEnum::KILOGRAM : null;

        return [
            'height' => $height,
            'height_measure_type' => $heightType,
            'weight' => $weight,
            'weight_measure_type' => $weightType,
        ];
    }
}

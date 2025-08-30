<?php

namespace Database\Seeders;

use App\Classes\Const\TreatmentsCatalog;
use App\Models\Treatment;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatMents = collect(TreatmentsCatalog::TREATMENTS);

        $data = $treatMents->map(function ($plan) {
            return [
                'plan' => $plan["nombre"],
                'category' => $plan["categoria"],
                'description' => fake()->sentence(2),
                'cost_basis' => fake()->numberBetween(100, 1000)
            ];
        })->toArray();

        Treatment::insert($data);
    }
}

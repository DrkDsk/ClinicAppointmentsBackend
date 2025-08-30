<?php

namespace Database\Seeders;

use App\Classes\Const\TreatmentsCatalog;
use App\Models\Procedure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcedureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $procedures = collect(TreatmentsCatalog::TREATMENTS_PROCEDURES)
                        ->flatten()->unique()->values();

        $data = $procedures->map(function ($procedimiento) {
            return [
                'name' => $procedimiento,
                'description' => fake()->sentence(2)
            ];
        })->toArray();

        Procedure::insert($data);
    }
}

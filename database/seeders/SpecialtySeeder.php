<?php

namespace Database\Seeders;

use App\Classes\Const\Specialties;
use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSpecialty = collect(Specialties::all());

        $data = $defaultSpecialty->map(function ($specialty) {
            return [
                'name' => $specialty,
            ];
        })->toArray();

        Specialty::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Classes\Const\AppointmentType;
use App\Models\TypeAppointment;
use Illuminate\Database\Seeder;

class TypeAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            AppointmentType::INITIAL,
            AppointmentType::CONTROL,
            AppointmentType::URGENCE
        ];

        TypeAppointment::insert(
            collect($names)->map(fn($name) => [ 
                'name' => $name,
                'description' => ''
            ])->toArray()
        );
    }
}

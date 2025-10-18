<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Repositories\DoctorRepository;
use App\Models\Doctor;

class EloquentDoctorRepository implements DoctorRepository
{
    public function create(string $personId, string $specialty): Doctor
    {
        return Doctor::create([
            'person_id' => $personId,
            'specialty' => $specialty
        ]);
    }
}

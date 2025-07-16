<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Repositories\DoctorRepository;
use App\Models\Doctor;

class EloquentDoctorRepository implements DoctorRepository
{
    public function create(CreateDoctorDTO $dto): Doctor
    {
        return Doctor::create([
            'person_id' => $dto->person->id,
            'specialty' => $dto->specialty
        ]);
    }
}

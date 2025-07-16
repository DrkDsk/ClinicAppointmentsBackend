<?php
namespace App\Infrastructure\Persistence\Doctor;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Repositories\DoctorRepository;
use App\Models\Doctor;

class EloquentDoctorRepository implements DoctorRepository
{
    public function create(CreateDoctorDTO $dto, int $personId): Doctor
    {
        return Doctor::create([
            'person_id' => $personId,
            'specialty' => $dto->specialty
        ]);
    }
}

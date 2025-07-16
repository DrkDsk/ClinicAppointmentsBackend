<?php
namespace App\Infrastructure\Persistence\Doctor;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Repositories\DoctorRepository;
use App\Models\Doctor;

class EloquentDoctorRepository implements DoctorRepository
{
    public function create(CreateDoctorDTO $dto): Doctor
    {
        return Doctor::create([
            'person_id' => $dto->personId,
            'specialty' => $dto->specialty
        ]);
    }

    public function existsByUser(string $personId): bool
    {
        return Doctor::where("person_id", $personId)->exists();
    }
}

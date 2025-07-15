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
            'user_id' => $dto->userId,
            'birthday' => $dto->birthday,
            'specialty' => $dto->specialty
        ]);
    }

    public function existsByEmail(string $email): bool
    {
        return Doctor::where("email", $email)->exists();
    }
}

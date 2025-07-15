<?php

namespace App\Infrastructure\Persistence\Patient;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Repositories\PatientRepository;
use App\Models\Patient;

class EloquentPatientRepository implements PatientRepository
{
    public function store(CreatePatientDTO $dto): Patient
    {
        return Patient::create([
            'user_id' => $dto->userId,
            'birthday' => $dto->birthday,
            'phone_number' => $dto->phoneNumber,
            'weight' => $dto->weight,
            'height' => $dto->height,
            'weight_measure_type' => $dto->weightMeasureEnum,
            'height_measure_type' => $dto->heightMeasureEnum
        ]);
    }

    public function existsByUser(string $userId): bool
    {
        return Patient::where('user_id', $userId)->exists();
    }
}
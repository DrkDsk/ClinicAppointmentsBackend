<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Repositories\PatientRepository;
use App\Models\Patient;

class EloquentPatientRepository implements PatientRepository
{
    public function store(CreatePatientDTO $dto): Patient
    {
        return Patient::create(attributes: [
            'person_id' => $dto->person->id,
            'weight' => $dto->weight,
            'height' => $dto->height,
            'weight_measure_type' => $dto->weightMeasureEnum,
            'height_measure_type' => $dto->heightMeasureEnum
        ]);
    }

    public function existsByUser(string $personId): bool
    {
        return Patient::where('person_id', $personId)->exists();
    }
}
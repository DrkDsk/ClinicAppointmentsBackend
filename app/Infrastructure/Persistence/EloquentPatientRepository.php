<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Repositories\PatientRepository;
use App\Models\Patient;

class EloquentPatientRepository implements PatientRepository
{
    public function store(CreatePatientDTO $patientData, string $personId): Patient
    {
        return Patient::create(attributes: [
            'person_id' => $personId,
            'weight' => $patientData->weight,
            'height' => $patientData->height,
            'weight_measure_type' => $patientData->weightMeasureEnum,
            'height_measure_type' => $patientData->heightMeasureEnum
        ]);
    }

    public function existsByUser(string $personId): bool
    {
        return Patient::where('person_id', $personId)->exists();
    }
}

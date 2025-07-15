<?php

namespace App\Infrastructure\Services\Patient;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Services\PatientServiceInterface;
use App\Models\Patient;

class PatientService implements PatientServiceInterface
{
    public function store(CreatePatientDTO $dto): Patient
    {

    }
}
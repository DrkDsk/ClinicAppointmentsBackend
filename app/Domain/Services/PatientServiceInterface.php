<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Models\Patient;

interface PatientServiceInterface
{
    public function store(CreatePatientDTO $dto): Patient;
}
<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Classes\DTOs\Response\PatientServiceResult;

interface PatientServiceInterface
{
    public function store(CreatePatientDTO $dto): PatientServiceResult;
}
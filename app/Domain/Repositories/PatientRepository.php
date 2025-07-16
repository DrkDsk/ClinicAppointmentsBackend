<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Models\Patient;

interface PatientRepository
{
    public function store(CreatePatientDTO $dto): Patient;
    public function existsByUser(string $personId): bool;
}
<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;

interface PatientRepository
{
    public function getAll() : LengthAwarePaginator;
    public function store(CreatePatientDTO $patientData, string $personId): Patient;
    public function existsByUser(string $personId): bool;
}

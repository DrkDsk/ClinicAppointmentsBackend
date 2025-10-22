<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;

interface PatientServiceInterface
{
    public function getAll() : LengthAwarePaginator;
    public function store(CreatePatientDTO $dto): Patient;
}

<?php

namespace App\Services\Contract;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;

interface PatientServiceInterface
{
    public function getAllPaginate(int $perPage) : LengthAwarePaginator;
    public function create(CreatePatientDTO $dto): Patient;
}

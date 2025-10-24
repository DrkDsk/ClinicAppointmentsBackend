<?php

namespace App\Domain\Repositories;

use App\Models\Doctor;
use Illuminate\Pagination\LengthAwarePaginator;

interface DoctorRepository
{
    public function getAllPaginate(int $perPage) : LengthAwarePaginator;
    public function create(string $personId, string $specialty): Doctor;
}

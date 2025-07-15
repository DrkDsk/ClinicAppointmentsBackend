<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;

interface DoctorRepository
{
    public function create(CreateDoctorDTO $dto);
    public function existsByEmail(string $userId): bool;
}
<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Models\Doctor;

interface DoctorRepository
{
    public function create(CreateDoctorDTO $dto): Doctor;
}
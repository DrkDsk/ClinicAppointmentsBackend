<?php
namespace App\Domain\Services;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Models\Doctor;

interface DoctorServiceInterface
{
    public function create(CreateDoctorDTO $dto) : Doctor;
}

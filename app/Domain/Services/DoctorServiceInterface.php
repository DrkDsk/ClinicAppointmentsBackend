<?php
namespace App\Domain\Services;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Classes\DTOs\Response\DoctorServiceResult;

interface DoctorServiceInterface
{
    public function create(CreateDoctorDTO $dto): DoctorServiceResult;
}
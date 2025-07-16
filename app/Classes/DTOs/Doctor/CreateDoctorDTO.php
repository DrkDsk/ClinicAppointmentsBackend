<?php

namespace App\Classes\DTOs\Doctor;

use App\Classes\DTOs\Person\CreatePersonDTO;
use App\Classes\DTOs\User\CreateUserDTO;

class CreateDoctorDTO
{
    public function __construct(
        public readonly CreatePersonDTO $person,
        public readonly string $specialty,
        public readonly ?CreateUserDTO $user = null,
    ) {
    }
}
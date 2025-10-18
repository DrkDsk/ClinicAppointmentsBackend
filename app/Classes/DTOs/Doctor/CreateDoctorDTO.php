<?php

namespace App\Classes\DTOs\Doctor;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\User\CreateUserDTO;

readonly class CreateDoctorDTO
{
    public function __construct(
        public PersonDTO      $person,
        public string         $specialty,
        public ?CreateUserDTO $user = null,
        public ?int           $id = null
    ) {
    }

}

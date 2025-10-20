<?php

namespace App\Classes\DTOs\Doctor;

use App\Classes\DTOs\Person\PersonDTO;

readonly class CreateDoctorDTO
{
    public function __construct(
        public PersonDTO      $person,
        public string         $specialty,
        public ?string $password = null,
        public ?int           $id = null
    ) {
    }

}

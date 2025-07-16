<?php

namespace App\Classes\DTOs\Doctor;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\User\CreateUserDTO;

class CreateDoctorDTO
{
    public function __construct(
        public readonly PersonDTO $person,
        public readonly string $specialty,
        public readonly ?CreateUserDTO $user = null,
        public readonly ?int $id = null
    ) {
    }

    public function copyWith(
        ?PersonDTO $person = null,
        ?string $specialty = null,
        ?CreateUserDTO $user = null,
        ?int $id = null
    ): self {
        return new self(
            person: $person ?? $this->person,
            specialty: $specialty ?? $this->specialty,
            user: $user ?? $this->user,
            id: $id
        );
    }
}
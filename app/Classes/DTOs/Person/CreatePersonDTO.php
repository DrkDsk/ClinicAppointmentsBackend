<?php

namespace App\Classes\DTOs\Person;

use App\Classes\DTOs\User\CreateUserDTO;

readonly class CreatePersonDTO
{
    public function __construct(
        public PersonDTO $personDTO,
        public CreateUserDTO $userDTO
    )
    {
    }
}

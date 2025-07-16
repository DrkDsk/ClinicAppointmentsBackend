<?php

namespace App\Classes\DTOs\Receptionist;

class CreateReceptionistDTO
{
    public function __construct(
        public readonly int $person_id,
        public readonly string $personEmail
    ) {

    }
}
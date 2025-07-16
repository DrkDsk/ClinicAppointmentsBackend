<?php

namespace App\Classes\DTOs\Person;

use Carbon\Carbon;

class CreatePersonDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly Carbon $birthday,
        public readonly string $phone
    ) {
    }
}
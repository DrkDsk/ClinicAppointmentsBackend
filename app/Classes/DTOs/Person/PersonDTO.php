<?php

namespace App\Classes\DTOs\Person;

use Carbon\Carbon;

readonly class PersonDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public Carbon $birthday,
        public string $phone,
        public ?int   $id = null,
    ) {
    }
}

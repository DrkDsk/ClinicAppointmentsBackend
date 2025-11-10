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

    public function toArray(): array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "birthday" => $this->birthday->format('Y-m-d'),
            "phone" => $this->phone,
        ];
    }
}

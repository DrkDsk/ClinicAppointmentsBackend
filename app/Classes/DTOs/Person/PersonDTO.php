<?php

namespace App\Classes\DTOs\Person;

use Carbon\Carbon;

class PersonDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly Carbon $birthday,
        public readonly string $phone,
        public readonly ?int $id = null,
    ) {
    }

    public function copyWith(
        ?int $id = null,
        ?string $name = null,
        ?string $email = null,
        ?Carbon $birthday = null,
        ?string $phone = null
    ): self {
        return new self(
            id: $id ?? $this->id,
            name: $name ?? $this->name,
            email: $email ?? $this->email,
            birthday: $birthday ?? $this->birthday,
            phone: $phone ?? $this->phone,
        );
    }


}
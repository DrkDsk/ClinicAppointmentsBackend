<?php

namespace App\Classes\DTOs\User;

class CreateUserDTO
{

    public function __construct(
        public readonly int $personId,
        public readonly ?string $personEmail = null,
        public readonly string $password,
        public readonly array $roles
    ) {
    }
}
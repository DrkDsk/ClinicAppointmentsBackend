<?php

namespace App\Classes\DTOs\User;

readonly class CreateUserDTO
{
    public function __construct(
        public string $password,
    ) {
    }
}

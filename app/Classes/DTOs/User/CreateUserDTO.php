<?php

namespace App\Classes\DTOs\User;

class CreateUserDTO
{

    public function __construct(
        public readonly string $password,
    ) {
    }
}
<?php 

namespace App\Classes\DTOs;

class CreateUserDTO {

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly array $roles
    ) {}
}
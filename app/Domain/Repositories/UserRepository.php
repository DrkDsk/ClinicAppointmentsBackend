<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\CreateUserDTO;
use App\Models\User;

interface UserRepository
{
    public function store(CreateUserDTO $dto): User;
    public function existsByEmail(string $email): bool;
}
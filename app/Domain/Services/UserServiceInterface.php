<?php

namespace App\Domain\Services;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Models\User;

interface UserServiceInterface
{
    public function store(CreateUserDTO $dto, string $email, int $personId, string $role): User;
}

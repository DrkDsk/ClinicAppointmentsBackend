<?php

namespace App\Domain\Services;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Http\Resources\UserResource;

interface UserServiceInterface
{
    public function store(CreateUserDTO $dto, string $email, int $personId, string $role): UserResource;
}
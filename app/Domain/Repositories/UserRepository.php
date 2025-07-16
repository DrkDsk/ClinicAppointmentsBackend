<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Models\User;

interface UserRepository
{
    public function store(CreateUserDTO $dto, int $personId): User;
    public function existsByPerson(string $email): ?User;
}
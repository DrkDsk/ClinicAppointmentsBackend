<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Models\User;

interface UserRepository
{
    public function store(CreateUserDTO $dto): User;
    public function existsByPerson(string $personId): bool;
}
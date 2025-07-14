<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\UserRepository;
use App\Models\User;
use App\UseCases\DTOs\CreateUserDTO;

class EloquentUserRepository implements UserRepository
{

    public function create(CreateUserDTO $dto): User
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => $dto->password,
            'roles' => $dto->roles
        ]);
    }

    public function existsByEmail(string $email): bool
    {
        return User::where('email', $email)->exists();
    }

}
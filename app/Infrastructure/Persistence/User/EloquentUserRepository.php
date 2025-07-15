<?php

namespace App\Infrastructure\Persistence\User;

use App\Classes\DTOs\CreateUserDTO;
use App\Domain\Repositories\UserRepository;
use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function store(CreateUserDTO $dto): User
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
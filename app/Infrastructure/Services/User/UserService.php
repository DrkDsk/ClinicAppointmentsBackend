<?php

namespace App\Infrastructure\Services\User;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Domain\Services\UserServiceInterface;
use App\Http\Resources\UserResource;
use App\Infrastructure\Persistence\EloquentUserRepository;

class UserService implements UserServiceInterface
{
    public function __construct(private readonly EloquentUserRepository $repository)
    {
    }

    public function store(CreateUserDTO $dto, string $email, int $personId, string $role): UserResource
    {
        $user = $this->repository->existsByPerson($email);

        if (!$user) {
            $user = $this->repository->store($dto, $personId);
            $user->syncRoles($role);
            $user->save();
        }

        return new UserResource($user);
    }
}
<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Domain\Services\UserServiceInterface;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\Models\User;

readonly class UserService implements UserServiceInterface
{
    public function __construct(private EloquentUserRepository $repository)
    {
    }

    /**
     * @throws \Throwable
     */
    public function store(CreateUserDTO $dto, string $email, int $personId, string $role): User
    {
        $user = $this->repository->existsByPerson($email);

        if (!$user) {
            $user = $this->repository->store($dto->password, $personId);
            $user->syncRoles($role);
            $user->save();
        }

        return $user;
    }
}

<?php

namespace App\Infrastructure\Services\User;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Domain\Services\UserServiceInterface;
use App\Exceptions\ModelAlreadyExistsException;
use App\Http\Resources\UserResource;
use App\Infrastructure\Persistence\User\EloquentUserRepository;
use App\Models\User;

class UserService /* implements UserServiceInterface */
{
    public function __construct(private readonly EloquentUserRepository $repository)
    {
    }

    public function store(CreateUserDTO $dto)/* : UserResource */
    {
        if ($this->repository->existsByPerson($dto->personId)) {
            throw new ModelAlreadyExistsException("El modelo:" . User::class . " ya está relacionado con el email:$dto->personEmail");
        }

        $user = $this->repository->store($dto);
        $user->syncRoles($dto->roles);
        $user->save();

        return new UserResource($user);
    }
}
<?php

namespace App\Services;

use App\Classes\DTOs\CreateUserDTO;
use App\Exceptions\ModelAlreadyExistsException;
use App\Http\Resources\UserResource;
use App\Infrastructure\Persistence\User\EloquentUserRepository;
use App\Models\User;

class UserService
{

    public function __construct(private readonly EloquentUserRepository $repository)
    {
    }

    public function store(CreateUserDTO $data): UserResource
    {
        if ($this->repository->existsByEmail($data->email)) {
            throw new ModelAlreadyExistsException("El modelo:" . User::class . "ya está relacionado con el email:$data->email");
        }

        $user = $this->repository->store($data);

        return new UserResource($user);
    }
}
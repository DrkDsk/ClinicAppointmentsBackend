<?php

namespace App\Services;

use App\Classes\DTOs\CreateUserDTO;
use App\Exceptions\EmailAlreadyExistsException;
use App\Http\Resources\UserResource;
use App\Infrastructure\Persistence\User\EloquentUserRepository;

class UserService
{

    public function __construct(private EloquentUserRepository $repository)
    {
    }

    public function store(CreateUserDTO $data): UserResource
    {
        if ($this->repository->existsByEmail($data->email)) {
            throw new EmailAlreadyExistsException($data->email);
        }

        $user = $this->repository->store($data);

        return new UserResource($user);
    }
}
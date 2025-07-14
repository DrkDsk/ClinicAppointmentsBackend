<?php

namespace App\UseCases;

use App\Exceptions\EmailAlreadyExistsException;
use App\Http\Resources\UserResource;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\UseCases\DTOs\CreateUserDTO;

class CreateUserUseCase
{

    public function __construct(private EloquentUserRepository $repository)
    {
    }

    public function handle(CreateUserDTO $data): UserResource
    {
        if ($this->repository->existsByEmail($data->email)) {
            throw new EmailAlreadyExistsException($data->email);
        }

        $user = $this->repository->create($data);

        return new UserResource($user);
    }
}
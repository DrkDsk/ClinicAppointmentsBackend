<?php 

namespace App\UseCases;

use App\Http\Resources\UserResource;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\UseCases\DTOs\CreateUserDTO;

class CreateUserUseCase {

    public function __construct(private EloquentUserRepository $repository) {}

    public function handle(CreateUserDTO $data): UserResource {
        $user = $this->repository->create($data);

        return new UserResource($user);
    }
}
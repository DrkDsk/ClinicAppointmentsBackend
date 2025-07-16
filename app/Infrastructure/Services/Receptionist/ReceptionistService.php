<?php

namespace App\Infrastructure\Services\Receptionist;

use App\Classes\DTOs\Receptionist\CreateReceptionistDTO;
use App\Domain\Services\ReceptionistServiceInterface;
use App\Exceptions\ModelAlreadyExistsException;
use App\Http\Resources\ReceptionistResource;
use App\Infrastructure\Persistence\EloquentReceptionistRepository;
use App\Models\Receptionist;

class ReceptionistService implements ReceptionistServiceInterface
{
    public function __construct(protected readonly EloquentReceptionistRepository $repository)
    {
    }
    public function store(CreateReceptionistDTO $dto): ReceptionistResource
    {
        if ($this->repository->existsByUser($dto->person_id)) {
            throw new ModelAlreadyExistsException("El modelo:" . Receptionist::class . " ya está relacionado con el email: '$dto->personEmail'");
        }

        $receptionist = $this->repository->store($dto);

        return new ReceptionistResource($receptionist);
    }
}
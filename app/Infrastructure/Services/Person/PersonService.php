<?php

namespace App\Infrastructure\Services\Person;

use App\Classes\DTOs\Person\CreatePersonDTO;
use App\Domain\Services\PersonServiceInterface;
use App\Exceptions\ModelAlreadyExistsException;
use App\Http\Resources\PersonResource;
use App\Infrastructure\Persistence\Person\EloquentPersonRepository;
use App\Models\Person;

class PersonService implements PersonServiceInterface
{

    public function __construct(private readonly EloquentPersonRepository $repository)
    {
    }

    public function store(CreatePersonDTO $dto): PersonResource
    {
        if ($this->repository->existsByEmail($dto->email)) {
            throw new ModelAlreadyExistsException("El modelo:" . Person::class . " ya está relacionado con el email: '$dto->email'");
        }

        $person = $this->repository->create($dto);

        return new PersonResource($person);
    }
}
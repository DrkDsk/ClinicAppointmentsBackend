<?php

namespace App\Infrastructure\Services\Person;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\Response\PersonServiceResult;
use App\Domain\Services\PersonServiceInterface;
use App\Infrastructure\Persistence\Person\EloquentPersonRepository;

class PersonService implements PersonServiceInterface
{

    public function __construct(private readonly EloquentPersonRepository $repository)
    {
    }

    public function store(PersonDTO $dto): PersonServiceResult
    {
        $model = $this->repository->existsByEmail($dto->email);
        if ($model) {
            return new PersonServiceResult(
                wasCreated: false,
                model: $model
            );
        }

        $person = $this->repository->create($dto);

        return new PersonServiceResult(true, model: $person);
    }
}
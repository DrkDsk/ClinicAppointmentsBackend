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
        $person = $this->repository->existsByEmail($dto->email);
        if ($person) {
            return new PersonServiceResult(
                wasCreated: false,
                person: $person
            );
        }

        $person = $this->repository->create($dto);

        return new PersonServiceResult(true, person: $person);
    }
}
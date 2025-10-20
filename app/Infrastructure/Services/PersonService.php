<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Services\PersonServiceInterface;
use App\Exceptions\PersonExistException;
use App\Infrastructure\Persistence\EloquentPersonRepository;
use App\Models\Person;

readonly class PersonService implements PersonServiceInterface
{

    public function __construct(private EloquentPersonRepository $repository)
    {
    }

    /**
     * @throws PersonExistException
     */
    public function store(PersonDTO $dto): Person
    {
        $person = $this->repository->existsByField(value: $dto->email, field: "email");
        if ($person) {
            throw new PersonExistException(message: "Este usuario ya se encuentra registrado");
        }

        return $this->repository->create($dto);
    }
}

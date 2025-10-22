<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Repositories\PersonRepository;
use App\Domain\Services\PersonServiceInterface;
use App\Exceptions\PersonExistException;
use App\Models\Person;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

readonly class PersonService implements PersonServiceInterface
{
    public function __construct(private PersonRepository $repository)
    {
    }

    /**
     * @throws PersonExistException
     * @throws Throwable
     */
    public function store(PersonDTO $personDTO): Person
    {
        $person = $this->repository->existsByField(value: $personDTO->email, field: "email");

        throw_if($person, new PersonExistException(message: "Este usuario ya se encuentra registrado"));

        return $this->repository->create($personDTO);
    }

    public function getAllPaginate(int $perPage = 10): LengthAwarePaginator
    {
       return $this->repository->getAllPaginate($perPage);
    }
}

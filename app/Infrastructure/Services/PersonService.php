<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Repositories\PersonRepositoryInterface;
use App\Domain\Services\PersonServiceInterface;
use App\Exceptions\PersonExistException;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class PersonService implements PersonServiceInterface
{
    public function __construct(private PersonRepositoryInterface $repository)
    {
    }

    /**
     * @throws PersonExistException
     * @throws Throwable
     */
    public function create(PersonDTO $personDTO): Person
    {
        $person = $this->repository->existsByField(value: $personDTO->email, field: "email");

        if ($person) {
            throw new PersonExistException(message: "Este usuario ya se encuentra registrado");
        }

        return DB::transaction(function () use ($personDTO) {
            return $this->repository->create($personDTO->toArray());
        });
    }

    public function getAllPaginate(int $perPage): LengthAwarePaginator
    {
       return $this->repository->paginate($perPage);
    }

    public function search(string $query): Collection
    {
        return $this->repository->search($query);
    }
}

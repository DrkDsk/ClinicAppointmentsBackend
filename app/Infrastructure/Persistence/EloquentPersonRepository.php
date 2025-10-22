<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Repositories\PersonRepository;
use App\Models\Person;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentPersonRepository implements PersonRepository
{
    public function create(PersonDTO $dto): Person
    {
        return Person::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'birthday' => $dto->birthday->format('Y-m-d'),
            'phone' => $dto->phone
        ]);
    }

    public function existsByField(string $value, string $field = "phone"): ?Person
    {
        return Person::where($field, $value)->first();
    }


    public function getAllPaginate(int $perPage): LengthAwarePaginator
    {
        return Person::paginate($perPage);
    }
}

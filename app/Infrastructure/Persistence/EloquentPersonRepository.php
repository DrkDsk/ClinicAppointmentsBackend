<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Repositories\PersonRepository;
use App\Models\Person;

class EloquentPersonRepository implements PersonRepository
{
    public function create(PersonDTO $dto): Person
    {
        return Person::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'birthday' => $dto->birthday,
            'phone' => $dto->phone
        ]);
    }

    public function existsByField(string $value, string $field = "phone"): ?Person
    {
        return Person::where($field, $value)->first();
    }
}

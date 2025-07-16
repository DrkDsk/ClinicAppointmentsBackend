<?php

namespace App\Infrastructure\Persistence\Person;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Repositories\PersonRepository;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Person;
use App\Models\Receptionist;

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

    public function existsByEmail(string $email): ?Person
    {
        return Person::where('email', $email)->first();
    }
}
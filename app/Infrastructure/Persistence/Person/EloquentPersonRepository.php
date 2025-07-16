<?php

namespace App\Infrastructure\Persistence\Person;

use App\Classes\DTOs\Person\CreatePersonDTO;
use App\Domain\Repositories\PersonRepository;
use App\Models\Patient;
use App\Models\Person;
use App\Models\Receptionist;

class EloquentPersonRepository implements PersonRepository
{
    public function create(CreatePersonDTO $dto): Person
    {
        return Person::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'birthday' => $dto->birthday,
            'phone' => $dto->phone
        ]);
    }

    public function existsByEmail(string $email): bool
    {
        $existInPerson = Person::where('email', $email)->exists();

        $existInReceptionist = Receptionist::whereHas('person', function ($query) use ($email) {
            $query->where('email', $email);
        })->exists();

        $existInPatient = Patient::whereHas('person', function ($query) use ($email) {
            $query->where('email', $email);
        })->exists();

        return $existInPerson || $existInReceptionist || $existInPatient;
    }
}
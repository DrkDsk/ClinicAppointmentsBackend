<?php

namespace App\Infrastructure\Persistence;

use App\Classes\DTOs\Receptionist\CreateReceptionistDTO;
use App\Domain\Repositories\ReceptionistRepository;
use App\Models\Receptionist;

class EloquentReceptionistRepository implements ReceptionistRepository
{
    public function store(CreateReceptionistDTO $dto): Receptionist
    {
        return Receptionist::create([
            'person_id' => $dto->person_id
        ]);
    }

    public function existsByUser(string $personId): bool
    {
        return Receptionist::where('person_id', $personId)->exists();
    }
}
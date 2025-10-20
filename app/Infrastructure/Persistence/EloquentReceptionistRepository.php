<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\ReceptionistRepository;
use App\Models\Receptionist;

class EloquentReceptionistRepository implements ReceptionistRepository
{
    public function store(string $personId): Receptionist
    {
        return Receptionist::create([
            'person_id' => $personId
        ]);
    }

    public function existsByUser(string $personId): bool
    {
        return Receptionist::where('person_id', $personId)->exists();
    }
}

<?php

namespace App\Domain\Repositories;

use App\Models\Receptionist;

interface ReceptionistRepository
{
    public function store(string $personId): Receptionist;
    public function existsByUser(string $personId): bool;
}

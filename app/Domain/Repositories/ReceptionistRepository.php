<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Receptionist\CreateReceptionistDTO;
use App\Models\Receptionist;

interface ReceptionistRepository
{
    public function store(CreateReceptionistDTO $dto): Receptionist;
    public function existsByUser(string $personId): bool;
}
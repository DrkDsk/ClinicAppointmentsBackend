<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Receptionist;

interface ReceptionistServiceInterface
{
    public function store(PersonDTO $dto, string $password): Receptionist;
}

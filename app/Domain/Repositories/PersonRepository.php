<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;

interface PersonRepository
{
    public function create(PersonDTO $dto): Person;
    public function existsByEmail(string $email): ?Person;
}
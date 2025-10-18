<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;

interface PersonRepository
{
    public function create(PersonDTO $dto): Person;
    public function existsByField(string $value, string $field = "phone"): ?Person;
}

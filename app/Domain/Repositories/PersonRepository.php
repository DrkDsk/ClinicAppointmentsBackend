<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Person\CreatePersonDTO;
use App\Models\Person;

interface PersonRepository
{
    public function create(CreatePersonDTO $dto): Person;
    public function existsByEmail(string $email): bool;
}
<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;
use Illuminate\Pagination\LengthAwarePaginator;

interface PersonRepository
{
    public function getAll() : LengthAwarePaginator;
    public function create(PersonDTO $dto): Person;
    public function existsByField(string $value, string $field = "phone"): ?Person;
}

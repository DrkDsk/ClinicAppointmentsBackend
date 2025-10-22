<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PersonRepository
{
    public function getAllPaginate(int $perPage) : LengthAwarePaginator;
    public function create(PersonDTO $dto): Person;
    public function existsByField(string $value, string $field = "phone"): ?Person;
    public function search(string $query): Collection;
}

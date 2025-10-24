<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface PersonServiceInterface
{
    public function getAllPaginate(?int $perPage) : LengthAwarePaginator;
    public function store(PersonDTO $personDTO): Person;

    public function search(string $query) : Collection;
}

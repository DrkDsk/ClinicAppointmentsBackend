<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;
use Illuminate\Pagination\LengthAwarePaginator;

interface PersonServiceInterface
{
    public function getAllPaginate(int $perPage = 10) : LengthAwarePaginator;
    public function store(PersonDTO $personDTO): Person;
}

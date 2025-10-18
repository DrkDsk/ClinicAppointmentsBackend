<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Models\Person;

interface PersonServiceInterface
{
    public function store(PersonDTO $dto): Person;
}

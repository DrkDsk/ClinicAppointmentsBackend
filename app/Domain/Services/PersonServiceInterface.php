<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Person\CreatePersonDTO;
use App\Http\Resources\PersonResource;

interface PersonServiceInterface
{
    public function store(CreatePersonDTO $dto): PersonResource;
}
<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\Response\PersonServiceResult;

interface PersonServiceInterface
{
    public function store(PersonDTO $dto): PersonServiceResult;
}
<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Receptionist\CreateReceptionistDTO;
use App\Http\Resources\ReceptionistResource;

interface ReceptionistServiceInterface
{
    public function store(CreateReceptionistDTO $dto): ReceptionistResource;
}
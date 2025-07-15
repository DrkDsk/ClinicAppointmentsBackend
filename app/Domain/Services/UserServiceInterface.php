<?php

namespace App\Domain\Services;

use App\Classes\DTOs\CreateUserDTO;
use App\Http\Resources\UserResource;

interface UserServiceInterface
{
    public function store(CreateUserDTO $data): UserResource;
}
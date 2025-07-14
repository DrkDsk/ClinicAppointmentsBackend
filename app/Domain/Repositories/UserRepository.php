<?php

namespace App\Domain\Repositories;

use App\Models\User;
use App\UseCases\DTOs\CreateUserDTO;

interface UserRepository {
    public function create(CreateUserDTO $dto) : User; 
}
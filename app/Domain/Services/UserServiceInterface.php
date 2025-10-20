<?php

namespace App\Domain\Services;

use App\Models\User;

interface UserServiceInterface
{
    public function store(string $password, string $email, int $personId, string $role): User;
}

<?php

namespace App\Domain\Repositories;

use App\Models\User;

interface UserRepository
{
    public function store(string $password, int $personId): User;
    public function existsByPerson(string $email): ?User;
}

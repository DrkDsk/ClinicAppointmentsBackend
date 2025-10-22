<?php

namespace App\Domain\Services;

use App\Models\Person;
use App\Models\User;

interface UserServiceInterface
{
    public function store(string $password, int $personId, string $role): User;
    public function assignRoleTo(User $user, Person $person): void;
}

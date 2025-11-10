<?php

namespace App\Domain\Repositories;

use App\Models\Person;
use App\Repositories\Contract\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface PersonRepositoryInterface extends BaseRepositoryInterface
{
    public function existsByField(string $value, string $field = "phone"): ?Person;
    public function search(string $query): Collection;
}

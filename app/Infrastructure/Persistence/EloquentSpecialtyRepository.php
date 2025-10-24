<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\SpecialtyRepository;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Collection;

class EloquentSpecialtyRepository implements SpecialtyRepository
{
    public function getAll(): Collection
    {
        return Specialty::all();
    }
}

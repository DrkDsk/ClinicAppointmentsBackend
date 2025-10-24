<?php

namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface SpecialtyRepository
{
    public function getAll() : Collection;
}

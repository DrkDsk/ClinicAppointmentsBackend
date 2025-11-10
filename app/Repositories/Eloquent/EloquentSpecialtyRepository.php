<?php

namespace App\Repositories\Eloquent;

use App\Models\Specialty;
use App\Repositories\Contract\SpecialtyRepositoryInterface;

class EloquentSpecialtyRepository extends BaseRepository implements SpecialtyRepositoryInterface
{
    public function __construct(Specialty $model)
    {
        parent::__construct($model);
    }
}

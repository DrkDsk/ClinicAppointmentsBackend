<?php

namespace App\Repositories\Eloquent;

use App\Models\Doctor;
use App\Repositories\Contract\DoctorRepositoryInterface;

class EloquentDoctorRepository extends BaseRepository implements DoctorRepositoryInterface
{
    public function __construct(Doctor $model)
    {
        parent::__construct($model);
    }
}

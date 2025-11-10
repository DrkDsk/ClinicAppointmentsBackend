<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Repositories\Eloquent\BaseRepository;

class EloquentDoctorRepository extends BaseRepository implements DoctorRepositoryInterface
{
    public function __construct(Doctor $model)
    {
        parent::__construct($model);
    }
}

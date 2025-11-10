<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\PatientRepositoryInterface;
use App\Models\Patient;
use App\Repositories\Eloquent\BaseRepository;

class EloquentPatientRepository extends BaseRepository implements PatientRepositoryInterface
{

    public function __construct(Patient $model)
    {
        parent::__construct($model);
    }
}

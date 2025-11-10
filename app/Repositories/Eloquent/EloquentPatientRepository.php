<?php

namespace App\Repositories\Eloquent;

use App\Models\Patient;
use App\Repositories\Contract\PatientRepositoryInterface;

class EloquentPatientRepository extends BaseRepository implements PatientRepositoryInterface
{

    public function __construct(Patient $model)
    {
        parent::__construct($model);
    }
}

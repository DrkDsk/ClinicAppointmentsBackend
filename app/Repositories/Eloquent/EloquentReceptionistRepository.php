<?php

namespace App\Repositories\Eloquent;

use App\Models\Receptionist;
use App\Repositories\Contract\ReceptionistRepositoryInterface;

class EloquentReceptionistRepository extends BaseRepository implements ReceptionistRepositoryInterface
{
    public function __construct(Receptionist $model)
    {
        parent::__construct($model);
    }
}

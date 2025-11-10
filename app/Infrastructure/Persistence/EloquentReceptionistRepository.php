<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\ReceptionistRepository;
use App\Models\Receptionist;
use App\Repositories\Eloquent\BaseRepository;

class EloquentReceptionistRepository extends BaseRepository implements ReceptionistRepository
{
    public function __construct(Receptionist $model)
    {
        parent::__construct($model);
    }
}

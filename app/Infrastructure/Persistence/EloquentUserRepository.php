<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repositories\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;

class EloquentUserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}

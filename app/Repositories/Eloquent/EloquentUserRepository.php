<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contract\UserRepositoryInterface;

class EloquentUserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getByRolesPaginated(string $role, int $perPage)
    {
        return $this->model->role($role)->paginate($perPage);
    }
}

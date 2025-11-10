<?php

namespace App\Domain\Repositories;

use App\Repositories\Contract\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getByRolesPaginated(string $role, int $perPage);
}

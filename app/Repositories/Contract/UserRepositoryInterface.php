<?php

namespace App\Repositories\Contract;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getByRolesPaginated(string $role, int $perPage);
}

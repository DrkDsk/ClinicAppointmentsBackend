<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role as RoleClass;
use App\Domain\Services\UserServiceInterface;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\Models\Person;
use App\Models\User;

readonly class UserService implements UserServiceInterface
{
    public function __construct(private EloquentUserRepository $repository)
    {
    }

    /**
     * @throws \Throwable
     */
    public function store(string $password, string $email, int $personId, string $role): User
    {
        $user = $this->repository->existsByPerson($email);

        if (!$user) {
            $user = $this->repository->store($password, $personId);
            $user->syncRoles($role);
            $user->save();
        }

        return $user;
    }

    public function assignRoleTo(User $user, Person $person): void {
        if ($person->doctor) {
            $user->syncRoles(RoleClass::DOCTOR);
        }

        if ($person->receptionist) {
            $user->syncRoles(RoleClass::RECEPTIONIST);
        }

        if ($person->patient) {
            $user->syncRoles(RoleClass::PATIENT);
        }
    }
}

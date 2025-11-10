<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role as RoleClass;
use App\Models\Person;
use App\Models\User;
use App\Repositories\Contract\UserRepositoryInterface;
use App\Services\Contract\UserServiceInterface;
use Illuminate\Support\Facades\Hash;
use Throwable;

readonly class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    /**
     * @throws Throwable
     */
    public function create(string $password, int $personId, string $role): User
    {
        /** @var User $user */
        $user = $this->repository->create([
            'person_id' => $personId,
            'password' => Hash::make($password),
        ]);

        $user->syncRoles($role);
        $user->save();

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

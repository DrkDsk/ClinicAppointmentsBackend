<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Repositories\ReceptionistRepository;
use App\Domain\Services\PersonServiceInterface;
use App\Domain\Services\ReceptionistServiceInterface;
use App\Domain\Services\UserServiceInterface;
use App\Models\Receptionist;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class ReceptionistService implements ReceptionistServiceInterface
{
    public function __construct(
        protected PersonServiceInterface $personService,
        protected UserServiceInterface $userService,
        protected ReceptionistRepository $repository)
    {
    }

    /**
     * @throws Throwable
     */
    public function store(PersonDTO $dto, string $password): Receptionist
    {
        return DB::transaction(function () use ($dto, $password) {
            $person = $this->personService->store($dto);
            $personId = $person->id;

            $this->userService->store($password, $dto->email, $personId, Role::RECEPTIONIST);

            return $this->repository->store($personId);
       });
    }
}

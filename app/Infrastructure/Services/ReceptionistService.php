<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Services\ReceptionistServiceInterface;
use App\Infrastructure\Persistence\EloquentReceptionistRepository;
use App\Models\Receptionist;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class ReceptionistService implements ReceptionistServiceInterface
{
    public function __construct(
        protected PersonService $personService,
        protected UserService $userService,
        protected EloquentReceptionistRepository $repository)
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

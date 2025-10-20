<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\Person\PersonDTO;
use App\Domain\Services\ReceptionistServiceInterface;
use App\Infrastructure\Persistence\EloquentReceptionistRepository;
use App\Models\Receptionist;
use Throwable;

readonly class ReceptionistService implements ReceptionistServiceInterface
{
    public function __construct(
        protected PersonService $personService,
        protected EloquentReceptionistRepository $repository)
    {
    }

    /**
     * @throws Throwable
     */
    public function store(PersonDTO $dto, string $password): Receptionist
    {
        $person = $this->personService->store($dto);

        return $this->repository->store($person->id);
    }
}

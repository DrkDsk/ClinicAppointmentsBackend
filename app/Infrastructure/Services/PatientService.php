<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Classes\DTOs\Response\PatientServiceResult;
use App\Domain\Services\PatientServiceInterface;
use App\Infrastructure\Persistence\EloquentPatientRepository;

class PatientService implements PatientServiceInterface
{

    public function __construct(
        protected readonly EloquentPatientRepository $repository,
        private readonly PersonService $personService,
        private readonly UserService $userService
    ) {
    }

    public function store(CreatePatientDTO $dto): PatientServiceResult
    {
        $personResult = $this->personService->store($dto->person);

        if (!$personResult->wasCreated) {
            return new PatientServiceResult(wasCreated: false, personResult: $personResult);
        }

        $this->userService->store(
            dto: $dto->user,
            email: $dto->person->email,
            personId: $personResult->person->id,
            role: Role::PATIENT
        );

        $patient = $this->repository->store(dto: $dto->copyWith(
            person: $dto->person->copyWith(id: $personResult->person->id)
        ));

        return new PatientServiceResult(wasCreated: true, personResult: $personResult, patient: $patient);
    }
}
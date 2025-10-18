<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Services\PatientServiceInterface;
use App\Exceptions\PersonAlreadyExistException;
use App\Infrastructure\Persistence\EloquentPatientRepository;
use App\Models\Patient;

readonly class PatientService implements PatientServiceInterface
{

    public function __construct(
        protected EloquentPatientRepository $patientRepository,
        private PersonService               $personService,
        private UserService                 $userService
    ) {
    }

    /**
     * @throws PersonAlreadyExistException
     */
    public function store(CreatePatientDTO $dto): Patient
    {
        $person = $this->personService->store($dto->person);

        $this->userService->store(
            dto: $dto->user,
            email: $dto->person->email,
            personId: $person->id,
            role: Role::PATIENT
        );

        return $this->patientRepository->store(dto: $dto, personId: $person->id);
    }
}

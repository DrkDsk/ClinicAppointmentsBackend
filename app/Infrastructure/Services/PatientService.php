<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Services\PatientServiceInterface;
use App\Exceptions\PersonAlreadyExistException;
use App\Infrastructure\Persistence\EloquentPatientRepository;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class PatientService implements PatientServiceInterface
{

    public function __construct(
        protected EloquentPatientRepository $patientRepository,
        private PersonService               $personService,
        private UserService                 $userService
    ) {
    }

    /**
     * @throws PersonAlreadyExistException|Throwable
     */
    public function store(CreatePatientDTO $dto): Patient
    {
        $personData = $dto->person;
        $patientData = $dto;

        return DB::transaction(function () use ($personData, $patientData) {

            $person = $this->personService->store($personData);

            $this->userService->store(
                dto: $patientData->user,
                email: $personData->email,
                personId: $person->id,
                role: Role::PATIENT
            );

            return $this->patientRepository->store(patientData: $patientData, personId: $person->id);
        });
    }
}

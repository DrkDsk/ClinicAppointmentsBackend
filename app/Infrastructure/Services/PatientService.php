<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Repositories\PatientRepository;
use App\Domain\Services\PatientServiceInterface;
use App\Domain\Services\PersonServiceInterface;
use App\Domain\Services\UserServiceInterface;
use App\Exceptions\PersonExistException;
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class PatientService implements PatientServiceInterface
{
    public function __construct(
        private PatientRepository $patientRepository,
        private PersonServiceInterface   $personService,
        private UserServiceInterface     $userService
    ) {
    }

    /**
     * @throws PersonExistException|Throwable
     */
    public function store(CreatePatientDTO $dto): Patient
    {
        $personData = $dto->person;
        $patientData = $dto;

        return DB::transaction(function () use ($personData, $patientData) {

            $person = $this->personService->create($personData);
            $password = $patientData->password;

            if ($password) {
                $this->userService->create(
                    password: $password,
                    personId: $person->id,
                    role: Role::PATIENT
                );
            }

            return $this->patientRepository->store(patientData: $patientData,personId: $person->id);
        });
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->patientRepository->getAll();
    }
}

<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Classes\DTOs\Response\DoctorServiceResult;
use App\Domain\Services\DoctorServiceInterface;
use App\Infrastructure\Persistence\EloquentDoctorRepository;

class DoctorService implements DoctorServiceInterface
{
    public function __construct(
        private readonly EloquentDoctorRepository $repository,
        private readonly PersonService $personService,
        private readonly UserService $userService
    ) {
    }

    public function create(CreateDoctorDTO $dto): DoctorServiceResult
    {
        $personResult = $this->personService->store($dto->person);

        if (!$personResult->wasCreated) {
            return new DoctorServiceResult(wasCreated: false, personResult: $personResult);
        }

        if ($dto->user) {
            $this->userService->store(
                dto: $dto->user,
                email: $dto->person->email,
                personId: $personResult->person->id,
                role: Role::DOCTOR
            );
        }

        $doctor = $this->repository->create(
            $dto->copyWith(
                person: $dto->person->copyWith(id: $personResult->person->id)
            )
        );

        return new DoctorServiceResult(true, personResult: $personResult, doctor: $doctor);
    }
}


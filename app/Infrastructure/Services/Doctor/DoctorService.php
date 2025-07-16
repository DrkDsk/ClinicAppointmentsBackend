<?php

namespace App\Infrastructure\Services\Doctor;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Classes\DTOs\Response\DoctorServiceResult;
use App\Classes\Role;
use App\Domain\Services\DoctorServiceInterface;
use App\Infrastructure\Persistence\Doctor\EloquentDoctorRepository;
use App\Infrastructure\Services\Person\PersonService;
use App\Infrastructure\Services\User\UserService;

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
                personId: $personResult->model->id,
                role: Role::DOCTOR
            );
        }

        $newDto = $dto->copyWith($dto->person->copyWith($personResult->model->id));

        $doctor = $this->repository->create(dto: $newDto);

        return new DoctorServiceResult(true, personResult: $personResult, model: $doctor);
    }
}


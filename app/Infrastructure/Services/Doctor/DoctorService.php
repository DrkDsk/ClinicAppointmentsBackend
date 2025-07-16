<?php

namespace App\Infrastructure\Services\Doctor;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Classes\Role;
use App\Domain\Services\DoctorServiceInterface;
use App\Infrastructure\Persistence\Doctor\EloquentDoctorRepository;
use App\Infrastructure\Services\Person\PersonService;
use App\Infrastructure\Services\User\UserService;
use App\Models\Doctor;

class DoctorService implements DoctorServiceInterface
{
    public function __construct(
        private readonly EloquentDoctorRepository $repository,
        private readonly PersonService $personService,
        private readonly UserService $userService
    ) {
    }

    public function create(CreateDoctorDTO $dto): Doctor
    {
        $person = $this->personService->store($dto->person);

        if ($dto->user) {
            $this->userService->store(
                dto: $dto->user,
                email: $dto->person->email,
                personId: $person->id,
                role: Role::DOCTOR
            );
        }

        return $this->repository->create($dto, $person->id);
    }
}


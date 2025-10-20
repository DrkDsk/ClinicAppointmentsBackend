<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Services\DoctorServiceInterface;
use App\Exceptions\PersonExistException;
use App\Infrastructure\Persistence\EloquentDoctorRepository;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class DoctorService implements DoctorServiceInterface
{
    public function __construct(
        private EloquentDoctorRepository $repository,
        private PersonService            $personService,
        private UserService              $userService
    ) {
    }

    /**
     * @throws PersonExistException|Throwable
     */
    public function create(CreateDoctorDTO $dto) : Doctor
    {
        $personData = $dto->person;
        $password = $dto->password;
        $specialty = $dto->specialty;

        return DB::transaction(function () use ($personData, $password, $specialty) {

            $person = $this->personService->store($personData);

            if ($password) {
                $this->userService->store(
                    password: $password,
                    email: $personData->email,
                    personId: $person->id,
                    role: Role::DOCTOR
                );
            }

            return $this->repository->create($person->id, $specialty);
        });
    }
}


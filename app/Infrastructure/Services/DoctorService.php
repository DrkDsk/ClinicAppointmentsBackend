<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\Role;
use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Repositories\DoctorRepository;
use App\Domain\Services\DoctorServiceInterface;
use App\Domain\Services\PersonServiceInterface;
use App\Domain\Services\UserServiceInterface;
use App\Exceptions\PersonExistException;
use App\Models\Doctor;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class DoctorService implements DoctorServiceInterface
{
    public function __construct(
        private DoctorRepository $repository,
        private PersonServiceInterface $personService,
        private UserServiceInterface $userService
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
                    personId: $person->id,
                    role: Role::DOCTOR
                );
            }

            return $this->repository->create($person->id, $specialty);
        });
    }

    public function getAllPaginate(?int $perPage): LengthAwarePaginator
    {
        $perPage = $perPage ?? 10;
       return $this->repository->getAllPaginate($perPage);
    }
}


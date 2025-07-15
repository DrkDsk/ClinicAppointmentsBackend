<?php

namespace App\Infrastructure\Services\Doctor;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Domain\Services\DoctorServiceInterface;
use App\Exceptions\ModelAlreadyExistsException;
use App\Infrastructure\Persistence\Doctor\EloquentDoctorRepository;
use App\Models\Doctor;

class DoctorService implements DoctorServiceInterface
{
    public function __construct(private readonly EloquentDoctorRepository $repository)
    {
    }

    public function create(CreateDoctorDTO $dto): Doctor
    {
        if ($this->repository->existsByEmail($dto->userId)) {
            throw new ModelAlreadyExistsException("El modelo:" . Doctor::class . " ya está relacionado con el email: '$dto->userEmail'");
        }

        return $this->repository->create($dto);
    }
}


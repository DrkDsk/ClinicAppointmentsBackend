<?php

namespace App\Infrastructure\Services\Patient;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Domain\Services\PatientServiceInterface;
use App\Exceptions\ModelAlreadyExistsException;
use App\Infrastructure\Persistence\EloquentPatientRepository;
use App\Models\Patient;

class PatientService implements PatientServiceInterface
{

    public function __construct(protected readonly EloquentPatientRepository $repository)
    {
    }

    public function store(CreatePatientDTO $dto): Patient
    {
        if ($dto->userId != null && $this->repository->existsByUser($dto->userId)) {
            throw new ModelAlreadyExistsException("El modelo:" . Patient::class . " ya está relacionado con el email: '$dto->userEmail'");
        }

        return $this->repository->store($dto);
    }
}
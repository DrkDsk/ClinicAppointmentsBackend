<?php

namespace App\Services;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Exceptions\EmailAlreadyExistsException;
use App\Infrastructure\Persistence\Doctor\EloquentDoctorRepository;
use App\Models\Doctor;


class DoctorService
{
    public function __construct(private readonly EloquentDoctorRepository $repository)
    {
    }

    public function create(CreateDoctorDTO $dto): Doctor
    {
        if ($this->repository->existsByEmail($dto->userEmail)) {
            throw new EmailAlreadyExistsException($dto->userEmail);
        }

        return $this->repository->create($dto);
    }

}


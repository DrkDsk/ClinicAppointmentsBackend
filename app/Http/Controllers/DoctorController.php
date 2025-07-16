<?php

namespace App\Http\Controllers;

use App\Factories\CreateDoctorDTOFactory;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\CreateDoctorResource;
use App\Infrastructure\Services\Doctor\DoctorService;

class DoctorController extends Controller
{

    public function __construct(private readonly DoctorService $service)
    {
    }

    public function store(CreateDoctorRequest $request): CreateDoctorResource
    {
        $dto = CreateDoctorDTOFactory::fromRequest($request);

        $doctorResult = $this->service->create($dto);

        return new CreateDoctorResource(
            resource: $doctorResult
        );
    }
}

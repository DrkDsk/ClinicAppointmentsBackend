<?php

namespace App\Http\Controllers;

use App\Factories\CreatePatientDTOFactory;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PatientResource;
use App\Infrastructure\Services\PatientService;

class PatientController extends Controller
{
    public function __construct(protected readonly PatientService $service)
    {
    }

    public function store(CreatePatientRequest $request) : PatientResource|ErrorResource
    {
        $dto = CreatePatientDTOFactory::fromRequest($request);

        $patientResult = $this->service->store($dto);

        if (!$patientResult->personResult->wasCreated) {
            return new ErrorResource(
                message:"El perfil ya se encuentra registrado", 
                data:[
                    "profile_id" => $patientResult->personResult->person->id
                ]
            );
        }

        return new PatientResource($patientResult->patient);
    }
}

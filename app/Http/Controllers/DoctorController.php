<?php

namespace App\Http\Controllers;

use App\Factories\CreateDoctorDTOFactory;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\ErrorResource;
use App\Infrastructure\Services\DoctorService;

class DoctorController extends Controller
{

    public function __construct(private readonly DoctorService $service) {}

    public function store(CreateDoctorRequest $request): DoctorResource|ErrorResource
    {
        $dto = CreateDoctorDTOFactory::fromRequest($request);

        $doctorResult = $this->service->create($dto);

        if (!$doctorResult->personResult->wasCreated) {
            return new ErrorResource(
                message: "El perfil ya se encuentra registrado", 
                data: [
                    "profile_id" => $doctorResult->personResult->person->id
                ]
            );
        }

        return new DoctorResource($doctorResult->doctor);
    }
}

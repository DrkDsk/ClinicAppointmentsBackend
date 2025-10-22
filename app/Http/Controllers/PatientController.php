<?php

namespace App\Http\Controllers;

use App\Domain\Services\PatientServiceInterface;
use App\Factories\CreatePatientDTOFactory;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PatientResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class PatientController extends Controller
{
    public function __construct(protected readonly PatientServiceInterface $service)
    {
    }

    public function get()
    {
        try {
            $patients = $this->service->getAll();

            return PatientResource::collection($patients);
        } catch (Throwable $exception) {
            return ErrorResource::collection($exception->getMessage());
        }
    }

    public function store(CreatePatientRequest $request) : JsonResource
    {
        try {
            $dto = CreatePatientDTOFactory::fromRequest($request);

            $patient = $this->service->store($dto);

            return new PatientResource($patient);
        } catch (Throwable $e) {
            return new ErrorResource(message: $e->getMessage());
        }
    }
}

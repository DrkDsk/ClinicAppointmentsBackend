<?php

namespace App\Http\Controllers;

use App\Exceptions\PersonAlreadyExistException;
use App\Factories\CreatePatientDTOFactory;
use App\Http\Requests\CreatePatientRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PatientResource;
use App\Infrastructure\Services\PatientService;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class PatientController extends Controller
{
    public function __construct(protected readonly PatientService $service)
    {
    }

    public function store(CreatePatientRequest $request) : JsonResource
    {
        try {

            $dto = CreatePatientDTOFactory::fromRequest($request);

            $patient = $this->service->store($dto);

            return new PatientResource($patient);
        } catch (PersonAlreadyExistException $e) {
            return new ErrorResource(message: $e->getMessage(), statusCode: 409);
        } catch (Throwable $e) {
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Domain\Services\PatientServiceInterface;
use App\Exceptions\PersonExistException;
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

    public function store(CreatePatientRequest $request) : JsonResource
    {
        try {
            $dto = CreatePatientDTOFactory::fromRequest($request);

            $patient = $this->service->store($dto);

            return new PatientResource($patient);
        } catch (PersonExistException $e) {
            return new ErrorResource(message: $e->getMessage(), statusCode: 409);
        } catch (Throwable) {
            return new ErrorResource();
        }
    }
}

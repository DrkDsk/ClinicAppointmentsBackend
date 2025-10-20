<?php

namespace App\Http\Controllers;

use App\Exceptions\PersonAlreadyExistException;
use App\Factories\CreateDoctorDTOFactory;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\ErrorResource;
use App\Infrastructure\Services\DoctorService;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class DoctorController extends Controller
{

    public function __construct(private readonly DoctorService $service) {}

    public function store(CreateDoctorRequest $request) : JsonResource
    {
        try {

            $dto = CreateDoctorDTOFactory::fromRequest($request);

            $doctor = $this->service->create($dto);

            return (new DoctorResource($doctor));
        } catch (PersonAlreadyExistException $e) {
            return new ErrorResource(message: $e->getMessage(), statusCode: 409);
        } catch (Throwable) {
            return new ErrorResource();
        }
    }
}

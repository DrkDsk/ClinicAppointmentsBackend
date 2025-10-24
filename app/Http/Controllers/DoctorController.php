<?php

namespace App\Http\Controllers;

use App\Domain\Services\DoctorServiceInterface;
use App\Exceptions\PersonExistException;
use App\Factories\CreateDoctorDTOFactory;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Throwable;


class DoctorController extends Controller
{

    public function __construct(private readonly DoctorServiceInterface $service) {}

    public function get(Request $request)
    {
        $perPage = $request->perPage;
        $doctors = $this->service->getAllPaginate($perPage);

        return DoctorResource::collection($doctors);
    }

    public function store(CreateDoctorRequest $request) : JsonResource
    {
        try {
            $dto = CreateDoctorDTOFactory::fromRequest($request);

            $doctor = $this->service->create($dto);

            return (new DoctorResource($doctor));
        } catch (PersonExistException $e) {
            return new ErrorResource(message: $e->getMessage(), statusCode: 409);
        } catch (Throwable) {
            return new ErrorResource();
        }
    }
}

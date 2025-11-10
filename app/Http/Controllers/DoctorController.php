<?php

namespace App\Http\Controllers;

use App\Domain\Services\DoctorServiceInterface;
use App\Factories\CreateDoctorDTOFactory;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Throwable;


class DoctorController extends Controller
{

    public function __construct(private readonly DoctorServiceInterface $service) {}

    public function get(Request $request): AnonymousResourceCollection
    {
        $perPage = $request->input('perPage');
        $doctors = $this->service->getAllPaginate($perPage);

        return DoctorResource::collection($doctors);
    }

    public function store(CreateDoctorRequest $request) : JsonResource
    {
        try {
            $dto = CreateDoctorDTOFactory::fromRequest($request);

            $doctor = $this->service->create($dto);

            return (new DoctorResource($doctor));
        } catch (Throwable) {
            return new ErrorResource();
        }
    }
}

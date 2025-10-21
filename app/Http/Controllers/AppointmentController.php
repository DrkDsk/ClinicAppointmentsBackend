<?php

namespace App\Http\Controllers;

use App\Factories\CreateAppointmentDTOFactory;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ErrorResource;
use App\Infrastructure\Services\AppointmentService;
use Throwable;

class AppointmentController extends Controller
{

    public function __construct(protected readonly AppointmentService $service)
    {
    }

    public function store(CreateAppointmentRequest $request) {

        try {
            $appointmentData = CreateAppointmentDTOFactory::fromRequest($request);

            $appointment = $this->service->store($appointmentData);

            return new AppointmentResource($appointment);

        } catch (Throwable $exception) {
            return new ErrorResource(message: $exception->getMessage());
        }
    }
}

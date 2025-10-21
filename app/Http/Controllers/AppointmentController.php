<?php

namespace App\Http\Controllers;

use App\Domain\Services\AppointmentServiceInterface;
use App\Factories\CreateAppointmentDTOFactory;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\ErrorResource;
use App\Models\Appointment;
use Throwable;

class AppointmentController extends Controller
{
    public function __construct(protected readonly AppointmentServiceInterface $service)
    {
    }

    public function store(CreateAppointmentRequest $request) {
        try {
            $appointmentData = CreateAppointmentDTOFactory::fromRequest($request);

            $appointment = $this->service->store($appointmentData);

            return new AppointmentResource($appointment);
        } catch (Throwable $exception) {
            return new ErrorResource(message: $exception->getMessage(), statusCode: 409);
        }
    }

    public function get() {
        $appointments = $this->service->getAll();

        return AppointmentResource::collection($appointments);
    }

    public function show(Appointment $appointment) {

        return new AppointmentResource($appointment);
    }
}

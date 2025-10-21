<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Domain\Repositories\AppointmentRepository;
use App\Domain\Services\AppointmentServiceInterface;
use App\Exceptions\AppointmentExistsException;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

readonly class AppointmentService implements AppointmentServiceInterface
{
    public function __construct(private readonly AppointmentRepository $appoinmentRepository)
    {
    }

    /**
     * @throws \Throwable
     */
    public function store(CreateAppointmentDTO $appointmentData): Appointment
    {
        dd($appointmentData);
        return DB::transaction(function () use ($appointmentData) {
            $appointmentStored = $this->appoinmentRepository->find(
                patientId: $appointmentData->patientId,
                doctorId: $appointmentData->doctorId,
                scheduleAt: $appointmentData->scheduleAt
            );

            if ($appointmentStored->exists) {
                $patientName = $appointmentStored->patient()->value('name');
                $doctorName = $appointmentStored->doctor()->value('name');

                $messageException = "Esta cita ya está programada para el paciente: $patientName con el doctor $doctorName";

                throw new AppointmentExistsException($messageException);
            }

            return $this->appoinmentRepository->store($appointmentData);
        });
    }
}

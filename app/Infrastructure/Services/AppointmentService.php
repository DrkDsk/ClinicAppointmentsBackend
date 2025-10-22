<?php

namespace App\Infrastructure\Services;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Domain\Repositories\AppointmentRepository;
use App\Domain\Services\AppointmentServiceInterface;
use App\Exceptions\AppointmentExistsException;
use App\Models\Appointment;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class AppointmentService implements AppointmentServiceInterface
{
    public function __construct(private AppointmentRepository $appointmentRepository)
    {
    }

    /**
     * @throws Throwable
     */
    public function store(CreateAppointmentDTO $appointmentData): Appointment
    {
        return DB::transaction(function () use ($appointmentData) {
            $appointmentStored = $this->appointmentRepository->find(
                doctorId: $appointmentData->doctorId,
                scheduledAt: $appointmentData->scheduledAt
            );

            if ($appointmentStored) {
                $doctorName = $appointmentStored->doctor->person->name;
                $messageException = "Esta cita ya está programada con el Doctor $doctorName";

                throw new AppointmentExistsException($messageException);
            }

            return $this->appointmentRepository->store($appointmentData);
        });
    }

    public function getAll() : LengthAwarePaginator
    {
        return $this->appointmentRepository->getAll();
    }
}

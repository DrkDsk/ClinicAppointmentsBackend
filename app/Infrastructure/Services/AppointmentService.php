<?php

namespace App\Infrastructure\Services;

use App\Classes\Const\AppointmentsStatus;
use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Exceptions\AppointmentExistsException;
use App\Models\Appointment;
use App\Repositories\Contract\AppointmentRepositoryInterface;
use App\Services\Contract\AppointmentServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

readonly class AppointmentService implements AppointmentServiceInterface
{
    public function __construct(private AppointmentRepositoryInterface $appointmentRepository)
    {
    }

    /**
     * @throws Throwable
     */
    public function store(CreateAppointmentDTO $appointmentData): Appointment
    {
        return DB::transaction(function () use ($appointmentData) {
            $scheduledAt = $appointmentData->scheduledAt->format('Y-m-d H:i:s');

            $appointment = $this->appointmentRepository->findByScheduled(
                doctorId: $appointmentData->doctorId,
                scheduledAt: $scheduledAt
            );

            if ($appointment) {
                $doctorName = $appointment->doctor->person->name;
                $messageException = "El doctor: $doctorName ya tiene una cita programada para $scheduledAt";

                throw new AppointmentExistsException($messageException);
            }

            return $this->appointmentRepository->create([
                'scheduled_at' => $appointmentData->scheduledAt->format('Y-m-d H:i:s'),
                'patient_id' => $appointmentData->patientId,
                'doctor_id' => $appointmentData->doctorId,
                'type_appointment_id' => $appointmentData->typeAppointmentId,
                'note' => $appointmentData->note,
                'status' => AppointmentsStatus::SCHEDULED
            ]);
        });
    }

    public function getAllPaginated(int $perPage) : LengthAwarePaginator
    {
        return $this->appointmentRepository->paginate($perPage);
    }
}

<?php

namespace App\Infrastructure\Persistence;

use App\Classes\Const\AppointmentsStatus;
use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Domain\Repositories\AppointmentRepository;
use App\Models\Appointment;
use Carbon\Carbon;

class EloquentAppointmentRepository implements AppointmentRepository
{
    public function store(CreateAppointmentDTO $appointmentData): Appointment
    {
        return Appointment::create([
            'scheduled_at' => $appointmentData->scheduledAt->format('Y-m-d H:i:s'),
            'patient_id' => $appointmentData->patientId,
            'doctor_id' => $appointmentData->doctorId,
            'type_appointment_id' => $appointmentData->typeAppointmentId,
            'note' => $appointmentData->note,
            'status' => AppointmentsStatus::SCHEDULED
        ]);
    }

    public function find(string $doctorId, Carbon $scheduledAt): Appointment | null
    {
        return Appointment::where('doctor_id', $doctorId)
            ->where('scheduled_at', $scheduledAt->format('Y-m-d H:i:s'))
            ->lockForUpdate()
            ->first();
    }
}

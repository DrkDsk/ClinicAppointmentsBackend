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
            'schedule_at' => $appointmentData->scheduleAt->toDate(),
            'patient_id' => $appointmentData->patientId,
            'doctor_id' => $appointmentData->doctorId,
            'type_appointment_id' => $appointmentData->typeAppointmentId,
            'note' => $appointmentData->note,
            'status' => AppointmentsStatus::SCHEDULED
        ]);
    }

    public function exists(string $patientId, string $doctorId, Carbon $scheduleAt): bool
    {
        return Appointment::where('doctor_id', $doctorId)
            ->where('patient_id', $patientId)
            ->where('schedule_at', $scheduleAt->format('Y-m-d H:i:s'))
            ->lockForUpdate()
            ->exists();
    }

    public function find(string $patientId, string $doctorId, Carbon $scheduleAt): Appointment
    {
        return Appointment::where('doctor_id', $doctorId)
            ->where('patient_id', $patientId)
            ->where('schedule_at', $scheduleAt->format('Y-m-d H:i:s'))
            ->first();
    }
}

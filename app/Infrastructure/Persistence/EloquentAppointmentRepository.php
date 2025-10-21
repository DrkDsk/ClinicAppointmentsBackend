<?php

namespace App\Infrastructure\Persistence;

use App\Classes\Const\AppointmentsStatus;
use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Domain\Repositories\AppoinmentRepository;
use App\Models\Appointment;

class EloquentAppointmentRepository implements AppoinmentRepository
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
}

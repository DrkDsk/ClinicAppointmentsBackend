<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Models\Appointment;
use Carbon\Carbon;

interface AppointmentRepository
{
    public function store(CreateAppointmentDTO $appointmentData): Appointment;
    public function exists(string $patientId, string $doctorId, Carbon $scheduleAt): bool;

    public function find(string $patientId, string $doctorId, Carbon $scheduleAt): Appointment;
}

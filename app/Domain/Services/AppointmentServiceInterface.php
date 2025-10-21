<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Models\Appointment;

interface AppointmentServiceInterface
{
    public function store(CreateAppointmentDTO $appointmentData) : Appointment;
}

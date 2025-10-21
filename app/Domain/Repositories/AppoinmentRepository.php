<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Models\Appointment;

interface AppoinmentRepository
{
    public function store(CreateAppointmentDTO $appointmentData): Appointment;
}

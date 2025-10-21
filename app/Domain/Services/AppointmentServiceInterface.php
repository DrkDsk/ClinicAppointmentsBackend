<?php

namespace App\Domain\Services;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Models\Appointment;
use Illuminate\Pagination\LengthAwarePaginator;

interface AppointmentServiceInterface
{
    public function getAll() : LengthAwarePaginator;
    public function store(CreateAppointmentDTO $appointmentData) : Appointment;
}

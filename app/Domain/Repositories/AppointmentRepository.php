<?php

namespace App\Domain\Repositories;

use App\Classes\DTOs\Appointment\CreateAppointmentDTO;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

interface AppointmentRepository
{
    public function getAll() : LengthAwarePaginator;
    public function store(CreateAppointmentDTO $appointmentData): Appointment;
    public function find(string $doctorId, Carbon $scheduledAt): Appointment | null;
}

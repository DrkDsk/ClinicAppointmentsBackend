<?php

namespace App\Repositories\Contract;

use App\Models\Appointment;

interface AppointmentRepositoryInterface extends BaseRepositoryInterface
{
    public function findByScheduled(int $doctorId, string $scheduledAt) : ?Appointment;
}

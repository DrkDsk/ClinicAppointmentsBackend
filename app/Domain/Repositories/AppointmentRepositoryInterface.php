<?php

namespace App\Domain\Repositories;

use App\Models\Appointment;
use App\Repositories\Contract\BaseRepositoryInterface;

interface AppointmentRepositoryInterface extends BaseRepositoryInterface
{
    public function findByScheduled(int $doctorId, string $scheduledAt) : ?Appointment;
}

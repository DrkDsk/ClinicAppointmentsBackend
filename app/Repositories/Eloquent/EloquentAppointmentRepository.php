<?php

namespace App\Repositories\Eloquent;


use App\Models\Appointment;
use App\Repositories\Contract\AppointmentRepositoryInterface;

class EloquentAppointmentRepository extends BaseRepository implements AppointmentRepositoryInterface
{
    public function __construct(Appointment $model)
    {
        parent::__construct($model);
    }

    public function findByScheduled(int $doctorId, string $scheduledAt): ?Appointment
    {
        return $this->model->where('doctor_id', $doctorId)
            ->where('scheduled_at', $scheduledAt)
            ->lockForUpdate()
            ->first();
    }
}

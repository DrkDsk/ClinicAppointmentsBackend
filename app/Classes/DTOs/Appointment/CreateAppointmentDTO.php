<?php

namespace App\Classes\DTOs\Appointment;

use Carbon\Carbon;

readonly class CreateAppointmentDTO
{
    public function __construct(
        public string $patientId,
        public string $doctorId,
        public Carbon $scheduleAt,
        public string $typeAppointmentId,
        public ?string $note,
    )
    {
    }
}

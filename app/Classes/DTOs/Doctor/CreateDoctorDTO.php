<?php

namespace App\Classes\DTOs\Doctor;

use Carbon\Carbon;

class CreateDoctorDTO
{
    public function __construct(
        public readonly int $personId,
        public readonly string $personEmail,
        public readonly Carbon $birthday,
        public readonly string $specialty
    ) {
    }
}
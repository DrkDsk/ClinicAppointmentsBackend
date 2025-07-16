<?php

namespace App\Classes\DTOs\Response;

use App\Classes\DTOs\Response\PersonServiceResult;
use App\Models\Doctor;

class DoctorServiceResult
{
    public function __construct(
        public readonly bool $wasCreated,
        public readonly PersonServiceResult $personResult,
        public readonly ?Doctor $doctor = null,
    ) {
    }
}
<?php

namespace App\Classes\DTOs\Response;

use App\Classes\DTOs\Response\PersonServiceResult;
use App\Models\Patient;

class PatientServiceResult
{
    public function __construct(
        public readonly bool $wasCreated,
        public readonly PersonServiceResult $personResult,
        public readonly ?Patient $patient = null,
    ) {
    }
}
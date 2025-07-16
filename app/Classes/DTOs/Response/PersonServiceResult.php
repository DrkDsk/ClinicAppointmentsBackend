<?php

namespace App\Classes\DTOs\Response;

use App\Models\Person;

class PersonServiceResult
{
    public function __construct(
        public readonly bool $wasCreated,
        public readonly ?Person $model = null,
    ) {
    }
}
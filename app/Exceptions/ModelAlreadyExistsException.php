<?php

namespace App\Exceptions;

use Exception;

class ModelAlreadyExistsException extends Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct("$message", 409);
    }
}

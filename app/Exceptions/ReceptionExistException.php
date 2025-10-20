<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ReceptionExistException extends Exception
{
    public function __construct(string $message = "", int $code = 409, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

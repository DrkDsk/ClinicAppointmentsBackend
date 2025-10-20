<?php

namespace App\Exceptions;

use Exception;

class PersonExistException extends Exception
{
    public function __construct(string $message = "", int $code = 409)
    {
        parent::__construct($message, code: $code);
    }
}

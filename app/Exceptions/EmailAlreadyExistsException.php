<?php

namespace App\Exceptions;

use Exception;

class EmailAlreadyExistsException extends Exception
{
    public function __construct(string $email)
    {
        parent::__construct("El correo '$email' ya está registrado.", 409);
    }
}

<?php

namespace App\Classes\Const;

final class Role
{

    public const DOCTOR = "doctor";
    public const ADMIN = "admin";
    public const RECEPTIONIST = "receptionist";
    public const PATIENT = "patient";

    public static function all(): array
    {
        return [
            self::ADMIN,
            self::DOCTOR,
            self::PATIENT,
            self::RECEPTIONIST
        ];
    }
}
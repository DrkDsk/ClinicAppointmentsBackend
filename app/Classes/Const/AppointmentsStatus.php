<?php

namespace App\Classes\Const;

final class AppointmentsStatus {

    public const SCHEDULED = "programada";
    public const DONE = "realizada";
    public const CANCELLED = "cancelada";
    public const RESCHEDULED = "reprogramada";
    
    public static function all() : array  {
        return [
            self::SCHEDULED,
            self::DONE,
            self::CANCELLED,
            self::RESCHEDULED
        ];
    }  
}
<?php

namespace App\Classes\Const;

final class TreatmentStatus {

    public const ACTIVE = "activo";
    public const COMPLETED = "completado";
    public const CANCELLED = "cancelado";

    public static function all() : array {
        return [
            self::ACTIVE,
            self::COMPLETED,
            self::CANCELLED
        ];
    }
}
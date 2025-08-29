<?php

namespace App\Classes\Const;

final class PaymentMethods {

    public const CARD = "card";
    public const CASH = "cash";
    public CONST transfer = "transferencia";

    public static function all() : array {
        return [
            self::CARD,
            self::CASH,
            self::transfer
        ];
    }
}
<?php

namespace App\Classes\Const;

use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;

final class BodyMeasures
{
    public static function weightMeasureTypes(): array
    {
        return [
            WeightMeasureEnum::KILOGRAM->value,
            WeightMeasureEnum::POUND->value
        ];
    }

    public static function heightMeasureTypes(): array
    {
        return [
            HeightMeasureEnum::CENTIMETER->value,
            HeightMeasureEnum::METER->value
        ];
    }
}
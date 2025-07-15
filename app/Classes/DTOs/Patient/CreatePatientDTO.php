<?php

namespace App\Classes\DTOs\Patient;

use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;
use Carbon\Carbon;

class CreatePatientDTO
{
    public function __construct(
        public readonly ?int $userId = null,
        public readonly Carbon $birthday,
        public readonly string $phoneNumber,
        public readonly float $weight,
        public readonly float $height,
        public readonly WeightMeasureEnum $weightMeasureEnum,
        public readonly HeightMeasureEnum $heightMeasureEnum
    ) {
    }
}
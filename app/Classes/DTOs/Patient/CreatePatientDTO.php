<?php

namespace App\Classes\DTOs\Patient;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;

readonly class CreatePatientDTO
{
    public function __construct(
        public PersonDTO         $person,
        public float             $weight,
        public float             $height,
        public WeightMeasureEnum $weightMeasureEnum,
        public HeightMeasureEnum $heightMeasureEnum,
        public ?string     $password = null,
        public ?int              $id = null,
    ) {
    }
}

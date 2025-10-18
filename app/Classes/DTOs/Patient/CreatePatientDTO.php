<?php

namespace App\Classes\DTOs\Patient;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\User\CreateUserDTO;
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
        public CreateUserDTO     $user,
        public ?int              $id = null,
    ) {
    }
}

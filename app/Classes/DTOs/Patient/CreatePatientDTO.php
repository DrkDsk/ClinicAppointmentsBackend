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

    public function copyWith(
        ?PersonDTO $person = null,
        ?float $weight = null,
        ?float $height = null,
        ?WeightMeasureEnum $weightMeasureEnum = null,
        ?HeightMeasureEnum $heightMeasureEnum = null,
        ?CreateUserDTO $user = null,
        ?int $id = null
    ): self {
        return new self(
            person: $person ?? $this->person,
            weight: $weight ?? $this->weight,
            height: $height ?? $this->height,
            weightMeasureEnum: $weightMeasureEnum ?? $this->weightMeasureEnum,
            heightMeasureEnum: $heightMeasureEnum ?? $this->heightMeasureEnum,
            user: $user ?? $this->user,
            id: $id ?? $this->id
        );
    }
}

<?php

namespace App\Classes\DTOs\Patient;

use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\User\CreateUserDTO;
use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;

class CreatePatientDTO
{
    public function __construct(
        public readonly PersonDTO $person,
        public readonly float $weight,
        public readonly float $height,
        public readonly WeightMeasureEnum $weightMeasureEnum,
        public readonly HeightMeasureEnum $heightMeasureEnum,
        public readonly CreateUserDTO $user,
        public readonly ?int $id = null,
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
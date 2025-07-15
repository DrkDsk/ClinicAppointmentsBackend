<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\Patient\CreatePatientDTO;
use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;
use App\Http\Requests\CreatePatientRequest;
use App\Infrastructure\Services\Patient\PatientService;
use App\Models\User;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function __construct(protected readonly PatientService $service)
    {
    }

    public function store(CreatePatientRequest $request, User $user)
    {
        $weightType = WeightMeasureEnum::tryFrom($request->weight_measure_type) ?? WeightMeasureEnum::KILOGRAM;
        $heightType = HeightMeasureEnum::tryFrom($request->height_measure_type) ?? HeightMeasureEnum::CENTIMETER;

        $dto = new CreatePatientDTO(
            userId: $user->id ?? null,
            userEmail: $user->email ?? null,
            birthday: Carbon::parse($request->birthday),
            phoneNumber: $request->phone_number,
            weight: $request->weight,
            height: $request->height,
            weightMeasureEnum: $weightType,
            heightMeasureEnum: $heightType
        );

        return $this->service->store($dto);
    }
}

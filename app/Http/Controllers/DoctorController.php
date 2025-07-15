<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Models\User;
use App\Services\DoctorService;
use Carbon\Carbon;

class DoctorController extends Controller
{

    public function __construct(private readonly DoctorService $service)
    {
    }

    public function store(CreateDoctorRequest $request, User $user)
    {
        $dto = new CreateDoctorDTO(
            $user->id,
            $user->email,
            Carbon::parse($request['birthday']),
            $request['specialty']
        );

        return $dto;


        $doctor = $this->service->create($dto);

        return new DoctorResource($doctor);
    }
}

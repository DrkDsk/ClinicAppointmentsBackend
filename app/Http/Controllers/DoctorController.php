<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\DoctorResource;
use App\Infrastructure\Services\Doctor\DoctorService;
use App\Models\User;
use Carbon\Carbon;

class DoctorController extends Controller
{

    public function __construct(private readonly DoctorService $service)
    {
    }

    public function store(CreateDoctorRequest $request, User $user)
    {
        $dto = new CreateDoctorDTO(
            userId: $user->id,
            userEmail: $user->email,
            birthday: Carbon::parse($request['birthday']),
            specialty: $request['specialty']
        );

        $doctor = $this->service->create($dto);

        return new DoctorResource($doctor);
    }
}

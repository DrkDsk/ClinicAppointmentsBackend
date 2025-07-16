<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\Doctor\CreateDoctorDTO;
use App\Classes\DTOs\Person\PersonDTO;
use App\Classes\DTOs\User\CreateUserDTO;
use App\Http\Requests\CreateDoctorRequest;
use App\Http\Resources\CreateDoctorResource;
use App\Infrastructure\Services\Doctor\DoctorService;
use Carbon\Carbon;

class DoctorController extends Controller
{

    public function __construct(private readonly DoctorService $service)
    {
    }

    public function store(CreateDoctorRequest $request)/* : DoctorResource */
    {
        $personRequest = $request->person;
        $userRequest = $request->user;
        $doctorRequest = $request->doctor;

        $personDto = new PersonDTO(
            name: $personRequest["name"],
            email: $personRequest["email"],
            birthday: Carbon::parse($personRequest["birthday"]),
            phone: $personRequest["phone"]
        );
        $userDto = null;

        if ($userRequest) {
            $userDto = new CreateUserDTO(
                password: $userRequest["password"]
            );
        }

        $dto = new CreateDoctorDTO(
            person: $personDto,
            specialty: $doctorRequest['specialty'],
            user: $userDto
        );

        $doctorResult = $this->service->create($dto);

        return new CreateDoctorResource(
            resource: $doctorResult
        );
    }
}

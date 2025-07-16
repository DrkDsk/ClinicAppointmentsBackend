<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\Receptionist\CreateReceptionistDTO;
use App\Http\Resources\ReceptionistResource;
use App\Infrastructure\Services\ReceptionistService;
use App\Models\Person;

class ReceptionistController extends Controller
{
    public function __construct(protected readonly ReceptionistService $service)
    {
    }
    public function store(Person $person): ReceptionistResource
    {
        $dto = new CreateReceptionistDTO(
            person_id: $person->id,
            personEmail: $person->email
        );

        return $this->service->store($dto);
    }
}

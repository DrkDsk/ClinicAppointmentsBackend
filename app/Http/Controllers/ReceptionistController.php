<?php

namespace App\Http\Controllers;

use App\Exceptions\PersonExistException;
use App\Factories\CreatePersonDTOFactory;
use App\Http\Requests\CreateReceptionsRequst;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\ReceptionistResource;
use App\Infrastructure\Services\ReceptionistService;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class ReceptionistController extends Controller
{
    public function __construct(protected readonly ReceptionistService $service)
    {
    }

    /**
     * @throws Throwable
     */
    public function store(CreateReceptionsRequst $request): JsonResource
    {
        $personData = CreatePersonDTOFactory::fromRequest($request);

        try {
            $receptionist = $this->service->store($personData->personDTO, $personData->password);

            return new ReceptionistResource($receptionist);
        } catch (PersonExistException $exception) {
            return new ErrorResource(message: $exception->getMessage());
        } catch (Throwable ) {
            return new ErrorResource();
        }
    }
}

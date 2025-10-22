<?php

namespace App\Http\Controllers;

use App\Domain\Services\PersonServiceInterface;
use App\Http\Requests\SearchPeopleRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\PersonResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class PeopleController extends Controller
{

    public function __construct(private readonly PersonServiceInterface $personService)
    {
    }

    public function search(SearchPeopleRequest $request) {
        $query = $request->input('query');

    }

    public function get(Request $request): JsonResource
    {
        try {

            $perPage = $request->perPage;
            $people = $this->personService->getAllPaginate($perPage);

            return PersonResource::collection($people);
        } catch (Throwable $e) {
            return new ErrorResource(message: $e->getMessage());
        }
    }
}

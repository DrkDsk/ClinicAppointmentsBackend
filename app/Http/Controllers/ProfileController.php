<?php

namespace App\Http\Controllers;

use App\Domain\Services\PersonServiceInterface;
use App\Http\Requests\SearchPeopleRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class ProfileController extends Controller
{

    public function __construct(private readonly PersonServiceInterface $personService)
    {
    }

    public function search(SearchPeopleRequest $request) {
        $query = $request->input('query');

        $persons = $this->personService->search($query);

        return ProfileResource::collection($persons);
    }

    public function get(Request $request): JsonResource
    {
        try {
            $perPage = $request->input('perPage', 10);
            $people = $this->personService->getAllPaginate($perPage);

            return ProfileResource::collection($people);
        } catch (Throwable $e) {
            return new ErrorResource(message: $e->getMessage());
        }
    }
}

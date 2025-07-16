<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\User\CreateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Infrastructure\Services\User\UserService;
use App\Models\Person;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function get(Request $request): UserResource
    {
        $user = $request->user();

        return new UserResource($user);
    }

    public function store(CreateUserRequest $request, Person $person)/* : UserResource */
    {
        $dto = new CreateUserDTO(
            personId: $person->id,
            personEmail: $person->email,
            password: $request->get('password'),
            roles: $request->roles
        );

        return $this->service->store($dto);
    }
}

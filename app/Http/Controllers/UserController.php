<?php

namespace App\Http\Controllers;

use App\Classes\DTOs\CreateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Infrastructure\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $service)
    {
    }

    public function get(Request $request)
    {
        $user = $request->user();

        return new UserResource($user);
    }

    public function store(CreateUserRequest $request): UserResource
    {
        $dto = new CreateUserDTO(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
            $request->get('roles')
        );

        return $this->service->store($dto);
    }
}

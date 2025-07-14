<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\UseCases\CreateUserUseCase;
use App\UseCases\DTOs\CreateUserDTO;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private CreateUserUseCase $createUserUseCase) {}

    public function get(Request $request) {
        $user = $request->user();

        return new UserResource($user);
    }

    public function create(CreateUserRequest $request): UserResource {
        $dto = new CreateUserDTO(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
            $request->get('roles')
        );

        return $this->createUserUseCase->handle($dto);
    }
}

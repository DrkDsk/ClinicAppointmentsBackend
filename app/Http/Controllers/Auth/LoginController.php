<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Repositories\PersonRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\ErrorResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct(private readonly PersonRepository $personRepository)
    {
    }

    public function login(LoginRequest $request): ErrorResource|AuthResource
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $person = $this->personRepository->existsByField(value: $email, field: "email");
        $user = $person?->user;
        $isValid = $user && Hash::check($password, $user->password);

        if (!$isValid) {
            return new ErrorResource("Credenciales incorrectas", statusCode: 401);
        }

        $token = $user->createToken("")->plainTextToken;

        return new AuthResource(
            message: "Login exitoso",
            token: $token,
            user: $user,
        );
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente',
        ]);
    }
}

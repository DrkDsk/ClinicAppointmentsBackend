<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Repositories\PersonRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function __construct(private readonly PersonRepository $personRepository)
    {
    }

    public function login(LoginRequest $request)
    {
        $person = $this->personRepository->existsByField(value: $request->email, field: "email");
        $user = $person?->user;
        $isValid = $user && Hash::check($request->password, $user->password);

        if (!$isValid) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken("")->plainTextToken;
        $roles = $user->roles;

        return response()->json(['token' => $token, 'roles' => $roles]);
    }
}

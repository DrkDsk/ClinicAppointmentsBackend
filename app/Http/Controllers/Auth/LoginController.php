<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $person = Person::where('email', $request->email)->first();

        $user = $person?->user;

        $isValid = $user && Hash::check($request->password, $user->password);

        if (!$isValid) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device)->plainTextToken;

        return response()->json(['token' => $token]);
    }
}

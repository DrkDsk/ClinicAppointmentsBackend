<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Infrastructure\Services\User\UserService;
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
}

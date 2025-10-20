<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollUserRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserResource;
use App\Infrastructure\Services\UserService;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

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
    public function enroll(Person $person, EnrollUserRequest $request) : JsonResource
    {
        try {
            if ($person->user()->exists()) {
                return new ErrorResource(message: "Este perfil ya tiene un usuario asignado", statusCode: 409);
            }

            return DB::transaction(function () use ($person, $request) {
                $user = $person->user()->create([
                    'password' => Hash::make($request->validated('password')),
                ]);

                $this->service->assignRoleTo($user, $person);

                return new UserResource($user);
            });
        } catch (Throwable) {
            return new ErrorResource(statusCode: 500);
        }
    }
}

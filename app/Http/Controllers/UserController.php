<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollUserRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\UserResource;
use App\Infrastructure\Services\UserService;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Classes\Const\Role as RoleClass;

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

    public function enroll(Person $person, EnrollUserRequest $request)
    {
        if ($person->user) {
            return new ErrorResource(message: "Este perfil ya tiene un usuario asignado");
        }

        $user = $person->user()->create([
            'password' => Hash::make($request->password)
        ]);

        if ($person->doctor) {
            $user->syncRoles(RoleClass::DOCTOR);
        }

        if ($person->receptionist) {
            $user->syncRoles(RoleClass::RECEPTIONIST);
        }

        return new UserResource($user);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\GetRoleRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class RoleController extends Controller
{
    public function set(CreateRoleRequest $request): UserResource
    {
        $user = $request->user();
        $user->syncRoles($request->get('roles'));

        return new UserResource($user);
    }

    public function only(GetRoleRequest $request)
    {
        $role = $request->role;

        $users = User::role($role)->paginate(20);

        return UserResource::collection($users);
    }
}

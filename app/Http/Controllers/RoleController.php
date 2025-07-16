<?php

namespace App\Http\Controllers;

use App\Classes\Role;
use App\Http\Requests\CreateRoleRequest;
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

    public function admins()
    {
        $users = User::role(Role::ADMIN)->paginate(20);

        return $users;
    }
}

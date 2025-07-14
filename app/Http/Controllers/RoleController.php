<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Resources\UserResource;

class RoleController extends Controller
{
    public function set(CreateRoleRequest $request) : UserResource {
        $user = $request->user();
        $user->syncRoles($request->get('roles'));

        return new UserResource($user);
    }
}

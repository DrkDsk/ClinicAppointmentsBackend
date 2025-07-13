<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Classes\Role as RoleClass;

class UserController extends Controller
{
    public function get(Request $request) {
        $user = $request->user();
        $adminRole = Role::findByName(RoleClass::ADMIN);

        return "hola";

        $user->assignRole($adminRole);
        $userRoles = $user->roles; 

        return response()->json([
            'user' => $user,
            'roles' => $userRoles
        ]);
    }
}

<?php

namespace App\Models;

use App\Classes\Role;

class Receptionist extends User
{
    protected static function booted() {
        static::addGlobalScope(Role::RECEPTIONIST, function ($query) {
            $query->where('role', Role::RECEPTIONIST);
        });
    }
}

<?php

namespace App\Models;

use App\Classes\Role;

class Doctor extends User
{
    protected static function booted() {
        static::addGlobalScope(Role::DOCTOR, function ($query) {
            $query->where('role', Role::DOCTOR);
        });
    }
}

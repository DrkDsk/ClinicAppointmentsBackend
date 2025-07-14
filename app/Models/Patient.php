<?php

namespace App\Models;

use App\Classes\Role;

class Patient extends User
{
    protected static function booted() {
        static::addGlobalScope(Role::PATIENT, function ($query) {
            $query->where('role', Role::PATIENT);
        });
    }
}

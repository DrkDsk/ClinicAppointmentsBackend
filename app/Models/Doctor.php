<?php

namespace App\Models;

class Doctor extends User
{
    protected static function booted() {
        static::addGlobalScope('doctor', function ($query) {
            $query->where('role', 'doctor');
        });
    }
}

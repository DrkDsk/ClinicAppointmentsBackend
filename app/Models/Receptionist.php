<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends User
{
    protected static function booted() {
        static::addGlobalScope('receptionist', function ($query) {
            $query->where('role', 'receptionist');
        });
    }
}

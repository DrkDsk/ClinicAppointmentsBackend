<?php

namespace App\Models;

use App\Classes\Role;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = ["person_id"];

    protected static function booted()
    {
        static::addGlobalScope(Role::RECEPTIONIST, function ($query) {
            $query->where('role', Role::RECEPTIONIST);
        });
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

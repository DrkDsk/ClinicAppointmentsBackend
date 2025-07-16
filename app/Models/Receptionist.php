<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = ["person_id"];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

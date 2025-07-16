<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['person_id', 'specialty'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

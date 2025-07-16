<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'weight',
        'height',
        'weight_measure_type',
        'height_measure_type'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}

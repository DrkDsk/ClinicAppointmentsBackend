<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birthday',
        'phone_number',
        'weight',
        'height',
        'weight_measure_type',
        'height_measure_type'
    ];
}

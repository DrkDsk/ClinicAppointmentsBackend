<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_at',
        'patient_id',
        'doctor_id',
        'type_appointment_id',
        'status',
        'note'
    ];
}

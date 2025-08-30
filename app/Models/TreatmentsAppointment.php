<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentsAppointment extends Model
{
    use HasFactory;

    public $fillable = [
        'treatment_patient_id',
        'appointment_id',
        'notes'
    ];
}

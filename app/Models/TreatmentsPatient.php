<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentsPatient extends Model
{
    use HasFactory;

    protected $fillable = [
        'treatment_id',
        'doctor_id',
        'patient_id',
        'start_date',
        'end_date',
        'status',
        'observations',
        'coast_total'
    ];
}

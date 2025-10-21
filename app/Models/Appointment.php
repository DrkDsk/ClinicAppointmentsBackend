<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo {
        return $this->belongsTo(Patient::class);
    }

    public function typeAppointment(): BelongsTo {
        return $this->belongsTo(TypeAppointment::class);
    }
}

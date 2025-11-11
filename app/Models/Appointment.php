<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_at',
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

    public function doctorProfile() : HasOneThrough {
        return $this->hasOneThrough(
            Person::class,
            Doctor::class,
            'id',
            'id',
            'doctor_id',
            'person_id'
        );
    }
}

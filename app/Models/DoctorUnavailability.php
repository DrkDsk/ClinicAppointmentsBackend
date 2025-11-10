<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorUnavailability extends Model
{
    protected $table = "doctor_unavailabilities";

    protected $fillable = ['doctor_id', 'date', 'all_day', 'reason', 'start_time', 'end_time'];
}

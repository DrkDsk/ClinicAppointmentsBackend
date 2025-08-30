<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsTreatmentsAppointment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'treatment_appointment_id',
        'amount'
    ];
}

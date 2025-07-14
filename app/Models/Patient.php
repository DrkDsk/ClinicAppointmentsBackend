<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $filable = ['user_id', 'birthday', 'phone_number', 'weight', 'height'];
    use HasFactory;
}

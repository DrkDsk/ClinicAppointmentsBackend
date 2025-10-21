<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'temperature',
        'blood_pressure',
        'pulse_rate',
        'weight',
        'height',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

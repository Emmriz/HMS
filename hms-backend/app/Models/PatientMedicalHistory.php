<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'recorded_by_staff_id',
        'diagnosis',
        'treatment',
        'notes',
        'recorded_at',
    ];

    protected $casts = [
        'recorded_at' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function recordedBy()
    {
        return $this->belongsTo(Staff::class, 'recorded_by_staff_id');
    }
}

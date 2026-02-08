<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'staff_id',
        'notes',
        'consultation_date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function treatmentPlans()
    {
        return $this->hasMany(TreatmentPlan::class);
    }
    public function appointment()
{
    return $this->belongsTo(Appointment::class);
}
}


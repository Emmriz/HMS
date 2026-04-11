<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_number',
        'first_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'date_of_birth',
        'address',
        'blood_group',
        'is_active',
    ];

public function contacts()
{
    return $this->hasMany(PatientContact::class);
}

public function medicalHistories()
{
    return $this->hasMany(PatientMedicalHistory::class);
}

public function admissions()
{
    return $this->hasMany(Admission::class);
}

public function treatmentPlans()
{
    return $this->hasManyThrough(
        TreatmentPlan::class,
        Consultation::class,
        'patient_id',      // Foreign key on consultations table
        'consultation_id', // Foreign key on treatment_plans table
        'id',              // Local key on patients table
        'id'               // Local key on consultations table
    );
}

public function prescriptions()
{
    return $this->hasMany(Prescription::class);
}

public function appointments()
{
    return $this->hasMany(Appointment::class);
}

}

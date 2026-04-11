<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'treatment_plan_id',
        'total_amount',
        'status',
        'notes',
    ];

    // Bill belongs to a patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Bill may be linked to a treatment plan
    public function treatmentPlan()
    {
        return $this->belongsTo(TreatmentPlan::class);
    }

    // Bill has many items
    public function items()
    {
        return $this->hasMany(BillItem::class);
    }

    // Bill has many payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
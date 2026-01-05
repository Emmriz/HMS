<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'plan',
        'follow_up_date',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

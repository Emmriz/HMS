<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_request_id',
        'recorded_by_staff_id',
        'result',
        'remarks',
        'reported_at',
    ];

    public function labRequest()
    {
        return $this->belongsTo(LabRequest::class);
    }

    public function recordedBy()
    {
        return $this->belongsTo(Staff::class, 'recorded_by_staff_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'staff_id',
        'lab_test_id',
        'status',
        'notes',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function labTest()
    {
        return $this->belongsTo(LabTest::class);
    }

    public function result()
{
    return $this->hasOne(LabResult::class);
}
}

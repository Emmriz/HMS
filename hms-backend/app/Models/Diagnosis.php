<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultation_id',
        'condition',
        'notes',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}

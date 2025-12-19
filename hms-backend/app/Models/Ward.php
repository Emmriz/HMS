<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'capacity',
        'is_active',
    ];

    public function beds()
    {
        return $this->hasMany(Bed::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
}

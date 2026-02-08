<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_test_category_id',
        'name',
        'code',
        'description',
        'price',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(LabTestCategory::class, 'lab_test_category_id');
    }
}

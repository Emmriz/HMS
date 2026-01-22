<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'drug_category_id',
        'name',
        'strength',
        'form',
        'price',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(DrugCategory::class, 'drug_category_id');
    }

    // Future relations: prescriptions, stock, dispensing
}

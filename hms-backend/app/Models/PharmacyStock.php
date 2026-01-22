<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyStock extends Model
{
    use HasFactory;

    protected $table = 'pharmacy_stock';

    protected $fillable = [
        'drug_id',
        'quantity',
        'batch_number',
        'expiry_date',
    ];

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}

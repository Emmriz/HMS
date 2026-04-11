<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'amount',
        'payment_method',
        'paid_at',
    ];

    // Payment belongs to a bill
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
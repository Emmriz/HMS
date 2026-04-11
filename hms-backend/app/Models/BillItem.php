<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'item_type',
        'item_id',
        'description',
        'amount',
        'quantity',
        'total',
    ];

    // Each item belongs to a bill
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
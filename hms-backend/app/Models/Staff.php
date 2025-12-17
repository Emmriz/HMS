<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'staff_number',
        'first_name',
        'last_name',
        'phone',
        'gender',
        'date_of_birth',
        'employment_type',
        'is_active',
    ];

    /**
     * Staff belongs to a department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Staff belongs to a user account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

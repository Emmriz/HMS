<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Spatie\Permission\Traits\HasRoles;

class Staff extends Model
{
    use HasFactory, HasRoles;

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
        'role',
        'is_active',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
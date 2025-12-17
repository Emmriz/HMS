<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\User;
use App\Models\Department;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        // Get Admin user
        $adminUser = User::where('email', 'admin@hospital.com')->first();

        // Get Administration department
        $adminDept = Department::where('code', 'ADMIN')->first();

        if ($adminUser && $adminDept) {
            Staff::firstOrCreate(
                ['user_id' => $adminUser->id],
                [
                    'department_id' => $adminDept->id,
                    'staff_number' => 'ADM001',
                    'first_name' => 'Super',
                    'last_name' => 'Admin',
                    'phone' => '08000000000',
                    'gender' => 'other',
                    'employment_type' => 'full_time',
                    'is_active' => true,
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\Department;
use App\Models\User;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $department = Department::first();

        if (!$department) {
            $this->command->info('Please seed departments first!');
            return;
        }

        $user = User::first(); // Ensure at least one user exists

        $staffMembers = [
            [
                'staff_number' => 'DOC001',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone' => '08012345678',
                'gender' => 'male',
                'date_of_birth' => '1980-01-01',
                'employment_type' => 'full-time',
                'role' => 'doctor',
            ],
            [
                'staff_number' => 'NUR001',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'phone' => '08087654321',
                'gender' => 'female',
                'date_of_birth' => '1985-05-05',
                'employment_type' => 'full-time',
                'role' => 'nurse',
            ],
            [
                'staff_number' => 'PHARM001',
                'first_name' => 'Albert',
                'last_name' => 'Pharma',
                'phone' => '08011223344',
                'gender' => 'male',
                'date_of_birth' => '1982-03-15',
                'employment_type' => 'full-time',
                'role' => 'pharmacist',
            ],
            [
                'staff_number' => 'LAB001',
                'first_name' => 'Mary',
                'last_name' => 'Lab',
                'phone' => '08055667788',
                'gender' => 'female',
                'date_of_birth' => '1986-07-20',
                'employment_type' => 'full-time',
                'role' => 'lab_tech',
            ],
            [
                'staff_number' => 'ADMIN001',
                'first_name' => 'Peter',
                'last_name' => 'Admin',
                'phone' => '08099887766',
                'gender' => 'male',
                'date_of_birth' => '1975-12-10',
                'employment_type' => 'full-time',
                'role' => 'admin',
            ],
            [
                'staff_number' => 'ACCT001',
                'first_name' => 'Linda',
                'last_name' => 'Account',
                'phone' => '08066778899',
                'gender' => 'female',
                'date_of_birth' => '1983-09-05',
                'employment_type' => 'full-time',
                'role' => 'accountant',
            ],
        ];

        foreach ($staffMembers as $staffData) {
            Staff::firstOrCreate(
                [
                    'staff_number' => $staffData['staff_number'],
                ],
                array_merge(
                    $staffData,
                    [
                        'user_id' => $user->id,
                        'department_id' => $department->id,
                        'is_active' => true,
                    ]
                )
            );
        }

        $this->command->info('Staff seeded successfully with all roles.');
    }
}

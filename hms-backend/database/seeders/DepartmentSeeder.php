<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
{
    $departments = [
        [
            'name' => 'General Medicine',
            'code' => 'GEN_MED',
            'description' => 'General medical consultations and treatments',
        ],
        [
            'name' => 'Surgery',
            'code' => 'SURG',
            'description' => 'Surgical procedures and operations',
        ],
        [
            'name' => 'Pediatrics',
            'code' => 'PED',
            'description' => 'Child healthcare services',
        ],
        [
            'name' => 'Pharmacy',
            'code' => 'PHARM',
            'description' => 'Medication dispensing and inventory',
        ],
        [
            'name' => 'Accounts',
            'code' => 'ACCT',
            'description' => 'Billing and financial management',
        ],
        [
            'name' => 'Administration',
            'code' => 'ADMIN',
            'description' => 'Hospital administration and management',
        ],
    ];

    foreach ($departments as $department) {
        \App\Models\Department::firstOrCreate(
            ['code' => $department['code']],  // Check by code
            $department                        // Insert if not exists
        );
    }
}

}


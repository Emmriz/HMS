<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            [
                'patient_number' => 'PAT001',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone' => '08011111111',
                'email' => 'johndoe@example.com',
                'gender' => 'male',
                'date_of_birth' => '1990-01-01',
                'address' => '123 Main Street, Lagos',
                'blood_group' => 'A+',
            ],
            [
                'patient_number' => 'PAT002',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'phone' => '08022222222',
                'email' => 'janesmith@example.com',
                'gender' => 'female',
                'date_of_birth' => '1985-05-15',
                'address' => '456 Elm Street, Lagos',
                'blood_group' => 'B+',
            ],
            [
                'patient_number' => 'PAT003',
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'phone' => '08033333333',
                'email' => 'michaelj@example.com',
                'gender' => 'male',
                'date_of_birth' => '1978-09-20',
                'address' => '789 Oak Avenue, Lagos',
                'blood_group' => 'O-',
            ],
            [
                'patient_number' => 'PAT004',
                'first_name' => 'Mary',
                'last_name' => 'Williams',
                'phone' => '08044444444',
                'email' => 'maryw@example.com',
                'gender' => 'female',
                'date_of_birth' => '1995-12-10',
                'address' => '321 Pine Street, Lagos',
                'blood_group' => 'AB+',
            ],
            [
                'patient_number' => 'PAT005',
                'first_name' => 'David',
                'last_name' => 'Brown',
                'phone' => '08055555555',
                'email' => 'davidb@example.com',
                'gender' => 'male',
                'date_of_birth' => '1988-07-07',
                'address' => '654 Maple Road, Lagos',
                'blood_group' => 'A-',
            ],
        ];

        foreach ($patients as $patient) {
            Patient::firstOrCreate(
                ['patient_number' => $patient['patient_number']],
                $patient
            );
        }
    }
}

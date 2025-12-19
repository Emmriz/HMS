<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\PatientContact;

class PatientContactSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();

        foreach ($patients as $patient) {
            PatientContact::firstOrCreate(
                [
                    'patient_id' => $patient->id,
                    'phone' => '080999000' . $patient->id,
                ],
                [
                    'name' => 'Emergency Contact',
                    'relationship' => 'Next of Kin',
                    'email' => 'contact' . $patient->id . '@example.com',
                    'address' => 'Lagos, Nigeria',
                ]
            );
        }
    }
}

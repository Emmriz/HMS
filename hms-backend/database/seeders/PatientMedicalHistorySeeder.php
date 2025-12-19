<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\PatientMedicalHistory;
use Carbon\Carbon;

class PatientMedicalHistorySeeder extends Seeder
{
    public function run(): void
    {
        $staff = Staff::first(); // Admin staff
        $patients = Patient::all();

        foreach ($patients as $patient) {
            PatientMedicalHistory::firstOrCreate(
                [
                    'patient_id' => $patient->id,
                    'recorded_by_staff_id' => $staff->id,
                    'recorded_at' => Carbon::now()->subDays(rand(1, 30)),
                ],
                [
                    'diagnosis' => 'General consultation',
                    'treatment' => 'Prescribed basic medication and rest',
                    'notes' => 'Patient responded well to treatment',
                ]
            );
        }
    }
}

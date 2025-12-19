<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admission;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Bed;
use Carbon\Carbon;

class AdmissionSeeder extends Seeder
{
    public function run(): void
    {
        $staff = Staff::first(); // Admin staff
        $patients = Patient::take(3)->get();
        $beds = Bed::where('status', 'available')->take(3)->get();

        foreach ($patients as $index => $patient) {
            $bed = $beds[$index];

            Admission::firstOrCreate(
                [
                    'patient_id' => $patient->id,
                    'bed_id' => $bed->id,
                    'status' => 'admitted',
                ],
                [
                    'ward_id' => $bed->ward_id,
                    'admitted_by_staff_id' => $staff->id,
                    'admission_date' => Carbon::now()->subDays(2),
                    'reason' => 'Observation and treatment',
                ]
            );

            // Update bed status
            $bed->update(['status' => 'occupied']);
        }
    }
}

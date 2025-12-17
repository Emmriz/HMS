<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Staff;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        // Get a sample staff (Admin/doctor)
        $staff = Staff::first();

        // Get some patients
        $patients = Patient::take(5)->get();

        foreach ($patients as $index => $patient) {
            Appointment::firstOrCreate(
                [
                    'patient_id' => $patient->id,
                    'staff_id' => $staff->id,
                    'appointment_date' => Carbon::now()->addDays($index + 1)->setTime(10, 0),
                ],
                [
                    'status' => 'scheduled',
                    'notes' => 'Initial checkup appointment',
                ]
            );
        }
    }
}

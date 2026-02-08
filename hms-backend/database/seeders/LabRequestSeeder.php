<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Staff;
use App\Models\LabTest;
use App\Models\LabRequest;

class LabRequestSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = Staff::where('role', 'doctor')->get();
        $appointments = Appointment::all();
        $labTests = LabTest::all();

        if ($doctors->isEmpty() || $appointments->isEmpty() || $labTests->isEmpty()) {
            $this->command->info('Missing doctors, appointments, or lab tests.');
            return;
        }

        foreach ($appointments as $appointment) {

            $doctor = $doctors->first(); // simple: 1 doctor
            $selectedTests = $labTests->random(min(2, $labTests->count()));

            foreach ($selectedTests as $test) {
                LabRequest::firstOrCreate(
                    [
                        'appointment_id' => $appointment->id,
                        'staff_id' => $doctor->id,
                        'lab_test_id' => $test->id,
                    ],
                    [
                        'status' => 'requested',
                        'notes' => 'Auto-generated request',
                    ]
                );
            }
        }
    }
}

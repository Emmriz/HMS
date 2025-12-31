<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;
use App\Models\Appointment;
use App\Models\Staff;

class ConsultationSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = Staff::first(); // Assign first available staff

        $appointments = Appointment::take(5)->get();

        foreach ($appointments as $appointment) {
            Consultation::firstOrCreate(
                [
                    'appointment_id' => $appointment->id,
                ],
                [
                    'staff_id' => $doctor->id,
                    'notes' => 'Patient examined. Further tests recommended.',
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\Drug;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\TreatmentPlan;

class PrescriptionSeeder extends Seeder
{
    public function run(): void
{
    $doctors = \App\Models\Staff::where('role', 'doctor')->get();
    $drugs = \App\Models\Drug::all();
    $treatmentPlans = \App\Models\TreatmentPlan::with('consultation.patient')->get();

    if ($doctors->isEmpty() || $drugs->isEmpty() || $treatmentPlans->isEmpty()) {
        $this->command->info('Missing doctors, drugs, or treatment plans.');
        return;
    }

    foreach ($treatmentPlans as $plan) {

        // Safety checks
        if (!$plan->consultation || !$plan->consultation->patient) {
            continue;
        }

        $patient = $plan->consultation->patient;
        $doctor = $doctors->first(); // you have 1 doctor

        $prescription = \App\Models\Prescription::firstOrCreate(
            [
                'treatment_plan_id' => $plan->id,
            ],
            [
                'patient_id' => $patient->id,
                'doctor_id' => $doctor->id,
                'notes' => 'Take medications exactly as prescribed.',
            ]
        );

        foreach ($drugs->random(2) as $drug) {
            \App\Models\PrescriptionItem::firstOrCreate(
                [
                    'prescription_id' => $prescription->id,
                    'drug_id' => $drug->id,
                ],
                [
                    'dosage' => '500mg',
                    'frequency' => '2 times daily',
                    'duration' => 5,
                ]
            );
        }
    }

    $this->command->info('Prescriptions seeded successfully.');
}


}

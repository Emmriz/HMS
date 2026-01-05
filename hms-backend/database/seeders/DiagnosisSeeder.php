<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosis;
use App\Models\Consultation;

class DiagnosisSeeder extends Seeder
{
    public function run(): void
    {
        $conditions = [
            'Hypertension',
            'Malaria',
            'Upper Respiratory Infection',
            'Type 2 Diabetes',
            'Gastritis',
        ];

        $consultations = Consultation::take(5)->get();

        foreach ($consultations as $consultation) {
            Diagnosis::firstOrCreate(
                [
                    'consultation_id' => $consultation->id,
                    'condition' => $conditions[array_rand($conditions)],
                ],
                [
                    'notes' => 'Diagnosis based on clinical assessment.',
                ]
            );
        }
    }
}

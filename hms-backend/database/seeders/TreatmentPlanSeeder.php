<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreatmentPlan;
use App\Models\Consultation;
use Carbon\Carbon;

class TreatmentPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            'Prescribe antimalarial drugs and review in 7 days.',
            'Start antihypertensive medication and monitor blood pressure.',
            'Administer antibiotics and advise rest.',
            'Recommend dietary changes and schedule follow-up.',
            'Prescribe pain relief and physiotherapy sessions.',
        ];

        $consultations = Consultation::take(5)->get();

        foreach ($consultations as $consultation) {
            TreatmentPlan::firstOrCreate(
                [
                    'consultation_id' => $consultation->id,
                ],
                [
                    'plan' => $plans[array_rand($plans)],
                    'follow_up_date' => Carbon::now()->addDays(rand(5, 14)),
                ]
            );
        }
    }
}

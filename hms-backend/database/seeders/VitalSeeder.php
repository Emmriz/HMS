<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vital;
use App\Models\Consultation;

class VitalSeeder extends Seeder
{
    public function run(): void
    {
        $consultations = Consultation::take(5)->get();

        foreach ($consultations as $consultation) {
            Vital::firstOrCreate(
                [
                    'consultation_id' => $consultation->id,
                ],
                [
                    'temperature' => rand(360, 380) / 10, // 36.0 – 38.0 °C
                    'blood_pressure' => '120/80',
                    'pulse_rate' => rand(60, 100),
                    'weight' => rand(50, 90),
                    'height' => rand(150, 190),
                ]
            );
        }
    }
}

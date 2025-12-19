<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;

class WardSeeder extends Seeder
{
    public function run(): void
    {
        $wards = [
            [
                'name' => 'General Ward',
                'code' => 'GEN_WARD',
                'description' => 'General patient admission ward',
                'capacity' => 30,
            ],
            [
                'name' => 'Maternity Ward',
                'code' => 'MAT_WARD',
                'description' => 'Maternity and childbirth ward',
                'capacity' => 20,
            ],
            [
                'name' => 'Pediatric Ward',
                'code' => 'PED_WARD',
                'description' => 'Children patient ward',
                'capacity' => 15,
            ],
            [
                'name' => 'ICU',
                'code' => 'ICU',
                'description' => 'Intensive Care Unit',
                'capacity' => 10,
            ],
        ];

        foreach ($wards as $ward) {
            Ward::firstOrCreate(
                ['code' => $ward['code']],
                $ward
            );
        }
    }
}

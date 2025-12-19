<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;
use App\Models\Bed;

class BedSeeder extends Seeder
{
    public function run(): void
    {
        $wards = Ward::all();

        foreach ($wards as $ward) {
            for ($i = 1; $i <= $ward->capacity; $i++) {
                Bed::firstOrCreate(
                    [
                        'ward_id' => $ward->id,
                        'bed_number' => 'B' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    ],
                    [
                        'status' => 'available',
                    ]
                );
            }
        }
    }
}

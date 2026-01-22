<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PharmacyStock;
use App\Models\Drug;
use Carbon\Carbon;

class PharmacyStockSeeder extends Seeder
{
    public function run(): void
    {
        $drugs = Drug::all();

        foreach ($drugs as $drug) {
            PharmacyStock::firstOrCreate(
                [
                    'drug_id' => $drug->id,
                    'batch_number' => 'BATCH' . rand(1000, 9999),
                ],
                [
                    'quantity' => rand(50, 200),
                    'expiry_date' => Carbon::now()->addMonths(rand(6, 24)),
                ]
            );
        }
    }
}

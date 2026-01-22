<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drug;
use App\Models\DrugCategory;

class DrugSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DrugCategory::all();

        if ($categories->isEmpty()) {
            $this->command->info('No drug categories found. Seed categories first!');
            return;
        }

        $drugs = [
            ['name' => 'Amoxicillin', 'strength' => '500mg', 'form' => 'Tablet', 'price' => 120],
            ['name' => 'Paracetamol', 'strength' => '500mg', 'form' => 'Tablet', 'price' => 50],
            ['name' => 'Artemether-Lumefantrine', 'strength' => '20/120mg', 'form' => 'Tablet', 'price' => 300],
            ['name' => 'Amlodipine', 'strength' => '5mg', 'form' => 'Tablet', 'price' => 150],
            ['name' => 'Vitamin C', 'strength' => '500mg', 'form' => 'Tablet', 'price' => 80],
        ];

        foreach ($drugs as $drug) {
            Drug::firstOrCreate(
                [
                    'name' => $drug['name'],
                    'drug_category_id' => $categories->random()->id,
                ],
                [
                    'strength' => $drug['strength'],
                    'form' => $drug['form'],
                    'price' => $drug['price'],
                    'is_active' => true,
                ]
            );
        }
    }
}

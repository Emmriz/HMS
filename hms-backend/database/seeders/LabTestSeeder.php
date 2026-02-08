<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabTest;
use App\Models\LabTestCategory;

class LabTestSeeder extends Seeder
{
    public function run(): void
    {
        $categories = LabTestCategory::all()->keyBy('name');

        if ($categories->isEmpty()) {
            $this->command->info('Please seed lab test categories first!');
            return;
        }

        $tests = [
            [
                'category' => 'Hematology',
                'name' => 'Full Blood Count',
                'code' => 'FBC',
                'description' => 'Measures blood components',
                'price' => 5000,
            ],
            [
                'category' => 'Microbiology',
                'name' => 'Malaria Parasite Test',
                'code' => 'MPT',
                'description' => 'Detects malaria parasite',
                'price' => 2500,
            ],
            [
                'category' => 'Clinical Chemistry',
                'name' => 'Blood Sugar',
                'code' => 'BS',
                'description' => 'Measures glucose level',
                'price' => 2000,
            ],
            [
                'category' => 'Radiology',
                'name' => 'Chest X-Ray',
                'code' => 'CXR',
                'description' => 'Chest imaging',
                'price' => 15000,
            ],
        ];

        foreach ($tests as $test) {
            $category = $categories[$test['category']] ?? null;

            if (!$category) {
                continue;
            }

            LabTest::firstOrCreate(
                ['code' => $test['code']],
                [
                    'lab_test_category_id' => $category->id,
                    'name' => $test['name'],
                    'description' => $test['description'],
                    'price' => $test['price'],
                    'is_active' => true,
                ]
            );
        }
    }
}

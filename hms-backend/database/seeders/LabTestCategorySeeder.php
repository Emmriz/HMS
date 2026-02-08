<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabTestCategory;

class LabTestCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hematology',
                'description' => 'Blood-related laboratory tests',
            ],
            [
                'name' => 'Microbiology',
                'description' => 'Tests for infections and microorganisms',
            ],
            [
                'name' => 'Clinical Chemistry',
                'description' => 'Chemical analysis of bodily fluids',
            ],
            [
                'name' => 'Radiology',
                'description' => 'Imaging and scan-related tests',
            ],
        ];

        foreach ($categories as $category) {
            LabTestCategory::firstOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}

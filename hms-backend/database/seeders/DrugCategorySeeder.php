<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DrugCategory;

class DrugCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Antibiotics',
                'description' => 'Drugs used to treat bacterial infections',
            ],
            [
                'name' => 'Analgesics',
                'description' => 'Pain relief medications',
            ],
            [
                'name' => 'Antimalarials',
                'description' => 'Treatment and prevention of malaria',
            ],
            [
                'name' => 'Antihypertensives',
                'description' => 'Blood pressure management drugs',
            ],
            [
                'name' => 'Vitamins & Supplements',
                'description' => 'Nutritional supplements',
            ],
        ];

        foreach ($categories as $category) {
            DrugCategory::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}

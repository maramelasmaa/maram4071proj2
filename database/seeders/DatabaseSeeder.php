<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Classification;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed classifications, categories and types so admin doesn't have to enter them manually.
        $seed = [
            'Humanities' => [
                'History' => ['General', 'Regional'],
                'Philosophy' => ['Ancient', 'Modern']
            ],
            'Science' => [
                'Physics' => ['Classical', 'Quantum'],
                'Biology' => ['Botany', 'Zoology']
            ],
            'Technology' => [
                'Computer Science' => ['Software', 'Hardware'],
                'Engineering' => ['Civil', 'Electrical']
            ]
        ];

        foreach ($seed as $classificationName => $categories) {
            $classification = Classification::firstOrCreate(['name' => $classificationName]);

            foreach ($categories as $categoryName => $types) {
                $category = Category::firstOrCreate([
                    'class_id' => $classification->id,
                    'name' => $categoryName
                ]);

                foreach ($types as $typeName) {
                    Type::firstOrCreate([
                        'category_id' => $category->id,
                        'name' => $typeName
                    ], [
                        'edition' => 1
                    ]);
                }
            }
        }
    }
}

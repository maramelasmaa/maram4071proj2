<?php

namespace Database\Seeders;

use App\Models\Books;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset data so we always seed a clean catalog with exactly 50 books.
        Schema::disableForeignKeyConstraints();
        Books::truncate();
        Type::truncate();
        Category::truncate();
        Classification::truncate();
        Schema::enableForeignKeyConstraints();

        // Seed a mixed catalog: Classification -> Category -> Type
        $catalog = [
            'Computer Science' => [
                'Programming' => [
                    ['name' => 'PHP', 'edition' => '3rd'],
                    ['name' => 'JavaScript', 'edition' => '2nd'],
                    ['name' => 'Python', 'edition' => '2nd'],
                    ['name' => 'Java', 'edition' => '2nd'],
                ],
                'Databases' => [
                    ['name' => 'SQL', 'edition' => '2nd'],
                    ['name' => 'NoSQL', 'edition' => '1st'],
                    ['name' => 'Data Modeling', 'edition' => '1st'],
                ],
                'Software Engineering' => [
                    ['name' => 'Architecture', 'edition' => '1st'],
                    ['name' => 'Testing', 'edition' => '1st'],
                    ['name' => 'Design Patterns', 'edition' => '1st'],
                ],
            ],
            'Business' => [
                'Management' => [
                    ['name' => 'Leadership', 'edition' => '1st'],
                    ['name' => 'Product', 'edition' => '1st'],
                    ['name' => 'Operations', 'edition' => '1st'],
                ],
                'Finance' => [
                    ['name' => 'Accounting', 'edition' => '1st'],
                    ['name' => 'Economics', 'edition' => '1st'],
                ],
            ],
            'Science' => [
                'Mathematics' => [
                    ['name' => 'Calculus', 'edition' => '2nd'],
                    ['name' => 'Linear Algebra', 'edition' => '1st'],
                ],
                'Physics' => [
                    ['name' => 'Mechanics', 'edition' => '1st'],
                    ['name' => 'Electricity & Magnetism', 'edition' => '1st'],
                ],
            ],
            'Arts & Humanities' => [
                'Design' => [
                    ['name' => 'Typography', 'edition' => '1st'],
                    ['name' => 'UX', 'edition' => '1st'],
                ],
                'Literature' => [
                    ['name' => 'Classics', 'edition' => '1st'],
                    ['name' => 'Modern', 'edition' => '1st'],
                ],
            ],
        ];

        $typeIds = [];

        foreach ($catalog as $classificationName => $categories) {
            $classification = Classification::create(['name' => $classificationName]);

            foreach ($categories as $categoryName => $types) {
                $category = Category::create([
                    'name' => $categoryName,
                    'class_id' => $classification->id,
                ]);

                foreach ($types as $typeInfo) {
                    $type = Type::create([
                        'name' => $typeInfo['name'],
                        'edition' => $typeInfo['edition'],
                        'category_id' => $category->id,
                    ]);

                    $typeIds[] = $type->id;
                }
            }
        }

        // Generate local cover images under storage/app/public so asset('storage/...') works.
        Storage::disk('public')->makeDirectory('books');
        $coversDir = Storage::disk('public')->path('books');

        $coverPaths = [];
        for ($i = 1; $i <= 12; $i++) {
            $filename = 'seed-cover-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT) . '.svg';
            $absPath = $coversDir . DIRECTORY_SEPARATOR . $filename;

            $bg = ['#0b0b12', '#1a0b2e', '#0f172a', '#111827'][($i - 1) % 4];
            $accent = ['#eab308', '#a855f7', '#60a5fa', '#22c55e'][($i - 1) % 4];

            $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="600" height="800" viewBox="0 0 600 800">
  <defs>
    <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0" stop-color="$accent" stop-opacity="0.85"/>
      <stop offset="1" stop-color="$accent" stop-opacity="0.25"/>
    </linearGradient>
  </defs>
  <rect width="600" height="800" fill="$bg"/>
  <rect x="36" y="36" width="528" height="728" rx="28" fill="url(#g)" opacity="0.22"/>
  <rect x="60" y="84" width="480" height="10" rx="5" fill="$accent" opacity="0.55"/>
  <text x="60" y="160" fill="#ffffff" font-family="Arial, sans-serif" font-size="40" font-weight="700">Dev Bookstore</text>
  <text x="60" y="210" fill="#d1d5db" font-family="Arial, sans-serif" font-size="18">Seed Cover #$i</text>
  <text x="60" y="720" fill="#9ca3af" font-family="Arial, sans-serif" font-size="14">Local image generated by seeder</text>
</svg>
SVG;

            File::put($absPath, $svg);
            $coverPaths[] = 'books/' . $filename;
        }

        // Seed 50 books. qtyInStock is always 1..5.
        $faker = fake();

        $titlePrefixes = ['Intro to', 'Foundations of', 'Applied', 'Practical', 'Modern', 'Essential', 'Advanced', 'Hands-on'];
        $titleSubjects = ['Systems', 'Algorithms', 'Databases', 'Networks', 'Security', 'Design', 'Architecture', 'Analytics', 'Mathematics', 'Writing', 'Business'];
        $titleSuffixes = ['Workbook', 'Guide', 'Handbook', 'Notes', 'Edition', 'Course'];

        for ($i = 1; $i <= 50; $i++) {
            $title = $titlePrefixes[array_rand($titlePrefixes)] . ' ' . $titleSubjects[array_rand($titleSubjects)] . ' ' . $titleSuffixes[array_rand($titleSuffixes)];
            $title .= ' (' . str_pad((string) $i, 2, '0', STR_PAD_LEFT) . ')';

            Books::create([
                'title' => $title,
                'author' => $faker->name(),
                'description' => $faker->paragraphs(3, true),
                'price' => random_int(150, 1200),
                'qtyInStock' => random_int(1, 5),
                'year' => random_int(1995, 2025),
                'publisher' => $faker->company(),
                'picture' => $coverPaths[array_rand($coverPaths)],
                'type_id' => $typeIds[array_rand($typeIds)],
            ]);
        }
    }
}

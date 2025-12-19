<?php

namespace Database\Seeders;

use App\Models\Books;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Build a small catalog: Classification -> Category -> Type
        $catalog = [
            'Computer Science' => [
                'Programming' => [
                    ['name' => 'PHP', 'edition' => '3rd'],
                    ['name' => 'JavaScript', 'edition' => '2nd'],
                    ['name' => 'Python', 'edition' => '2nd'],
                ],
                'Software Engineering' => [
                    ['name' => 'Architecture', 'edition' => '1st'],
                    ['name' => 'Testing', 'edition' => '1st'],
                    ['name' => 'Design Patterns', 'edition' => '1st'],
                ],
                'Databases' => [
                    ['name' => 'SQL', 'edition' => '2nd'],
                    ['name' => 'Data Modeling', 'edition' => '1st'],
                ],
                'Operating Systems' => [
                    ['name' => 'OS Concepts', 'edition' => '1st'],
                    ['name' => 'Linux', 'edition' => '1st'],
                ],
                'Algorithms' => [
                    ['name' => 'Algorithms', 'edition' => '3rd'],
                    ['name' => 'Data Structures', 'edition' => '2nd'],
                ],
            ],
            'Business' => [
                'Management' => [
                    ['name' => 'Leadership', 'edition' => '1st'],
                    ['name' => 'Product', 'edition' => '1st'],
                ],
                'Finance' => [
                    ['name' => 'Accounting', 'edition' => '1st'],
                    ['name' => 'Economics', 'edition' => '1st'],
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

        $typeMap = [];
        foreach ($catalog as $className => $categories) {
            $classification = Classification::updateOrCreate(
                ['name' => $className],
                ['name' => $className]
            );

            foreach ($categories as $categoryName => $types) {
                $category = Category::updateOrCreate(
                    ['name' => $categoryName, 'class_id' => $classification->id],
                    ['name' => $categoryName, 'class_id' => $classification->id]
                );

                foreach ($types as $typeInfo) {
                    $type = Type::updateOrCreate(
                        [
                            'name' => $typeInfo['name'],
                            'edition' => $typeInfo['edition'],
                            'category_id' => $category->id,
                        ],
                        [
                            'name' => $typeInfo['name'],
                            'edition' => $typeInfo['edition'],
                            'category_id' => $category->id,
                        ]
                    );

                    $key = $categoryName . '::' . $typeInfo['name'] . '::' . $typeInfo['edition'];
                    $typeMap[$key] = $type->id;
                }
            }
        }

        $pics = [
            'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=900&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=900&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=900&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=900&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1544717305-2782549b5136?w=900&auto=format&fit=crop',
        ];

        $books = [
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'A handbook of agile software craftsmanship with practical guidance for writing cleaner code.',
                'price' => 450,
                'year' => 2008,
                'publisher' => 'Prentice Hall',
                'picture' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=900&auto=format&fit=crop',
                'type_key' => 'Software Engineering::Architecture::1st',
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt & David Thomas',
                'description' => 'Classic advice and techniques for pragmatic software development.',
                'price' => 500,
                'year' => 1999,
                'publisher' => 'Addison-Wesley',
                'picture' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=900&auto=format&fit=crop',
                'type_key' => 'Software Engineering::Architecture::1st',
            ],
            [
                'title' => 'Introduction to Algorithms',
                'author' => 'Cormen, Leiserson, Rivest, Stein',
                'description' => 'Comprehensive reference covering a broad range of algorithms and data structures.',
                'price' => 800,
                'year' => 2009,
                'publisher' => 'MIT Press',
                'picture' => 'https://images.unsplash.com/photo-1524578271613-d550eacf6090?w=900&auto=format&fit=crop',
                'type_key' => 'Algorithms::Algorithms::3rd',
            ],
            [
                'title' => 'Design Patterns',
                'author' => 'Erich Gamma et al.',
                'description' => 'Foundational book describing reusable object-oriented design patterns.',
                'price' => 650,
                'year' => 1994,
                'publisher' => 'Addison-Wesley',
                'picture' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=900&auto=format&fit=crop',
                'type_key' => 'Software Engineering::Design Patterns::1st',
            ],
            [
                'title' => 'Refactoring',
                'author' => 'Martin Fowler',
                'description' => 'Improving the design of existing code through proven refactoring techniques.',
                'price' => 600,
                'year' => 2018,
                'publisher' => 'Addison-Wesley',
                'picture' => 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?w=900&auto=format&fit=crop',
                'type_key' => 'Software Engineering::Architecture::1st',
            ],
            [
                'title' => 'You Don\'t Know JS Yet',
                'author' => 'Kyle Simpson',
                'description' => 'A deep dive into core mechanisms of JavaScript and how to use them effectively.',
                'price' => 320,
                'year' => 2020,
                'publisher' => 'Independently published',
                'picture' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=900&auto=format&fit=crop',
                'type_key' => 'Programming::JavaScript::2nd',
            ],
            [
                'title' => 'Laravel: Up & Running',
                'author' => 'Matt Stauffer',
                'description' => 'Practical guide to building modern PHP apps with Laravel.',
                'price' => 420,
                'year' => 2019,
                'publisher' => "O'Reilly Media",
                'picture' => 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?w=900&auto=format&fit=crop',
                'type_key' => 'Programming::PHP::3rd',
            ],
            [
                'title' => 'Effective Java',
                'author' => 'Joshua Bloch',
                'description' => 'Best practices for writing robust Java code with clear explanations and examples.',
                'price' => 550,
                'year' => 2017,
                'publisher' => 'Addison-Wesley',
                'picture' => 'https://images.unsplash.com/photo-1473862177705-1e09f71a6f16?w=900&auto=format&fit=crop',
                'type_key' => 'Programming::JavaScript::2nd',
            ],
            [
                'title' => 'Operating System Concepts',
                'author' => 'Silberschatz, Galvin, Gagne',
                'description' => 'A solid introduction to operating systems principles and design.',
                'price' => 700,
                'year' => 2018,
                'publisher' => 'Wiley',
                'picture' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=900&auto=format&fit=crop',
                'type_key' => 'Operating Systems::OS Concepts::1st',
            ],
            [
                'title' => 'Database System Concepts',
                'author' => 'Silberschatz, Korth, Sudarshan',
                'description' => 'Core concepts of relational databases, SQL, and database design.',
                'price' => 680,
                'year' => 2019,
                'publisher' => 'McGraw-Hill',
                'picture' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=900&auto=format&fit=crop',
                'type_key' => 'Databases::SQL::2nd',
            ],
        ];

        // 40 additional books distributed across categories/types.
        $series = [
            [
                'base_title' => 'Modern PHP Workshop',
                'author' => 'Faculty Team',
                'publisher' => 'Academic Press',
                'year' => 2023,
                'base_price' => 360,
                'type_key' => 'Programming::PHP::3rd',
            ],
            [
                'base_title' => 'JavaScript for Interfaces',
                'author' => 'UI Research Group',
                'publisher' => 'Campus Editions',
                'year' => 2022,
                'base_price' => 340,
                'type_key' => 'Programming::JavaScript::2nd',
            ],
            [
                'base_title' => 'Python Data Science Notes',
                'author' => 'Lab Collective',
                'publisher' => 'Campus Editions',
                'year' => 2024,
                'base_price' => 390,
                'type_key' => 'Programming::Python::2nd',
            ],
            [
                'base_title' => 'Architecture Decision Records',
                'author' => 'Systems Council',
                'publisher' => 'Academic Press',
                'year' => 2021,
                'base_price' => 420,
                'type_key' => 'Software Engineering::Architecture::1st',
            ],
            [
                'base_title' => 'Testing Strategies Handbook',
                'author' => 'Quality Engineering Unit',
                'publisher' => 'Practical Library',
                'year' => 2020,
                'base_price' => 380,
                'type_key' => 'Software Engineering::Testing::1st',
            ],
            [
                'base_title' => 'Pattern Language Studies',
                'author' => 'Design Seminar',
                'publisher' => 'Academic Press',
                'year' => 2019,
                'base_price' => 410,
                'type_key' => 'Software Engineering::Design Patterns::1st',
            ],
            [
                'base_title' => 'Relational SQL Essentials',
                'author' => 'Database Faculty',
                'publisher' => 'Practical Library',
                'year' => 2021,
                'base_price' => 360,
                'type_key' => 'Databases::SQL::2nd',
            ],
            [
                'base_title' => 'Data Modeling Studio',
                'author' => 'Database Faculty',
                'publisher' => 'Practical Library',
                'year' => 2022,
                'base_price' => 370,
                'type_key' => 'Databases::Data Modeling::1st',
            ],
        ];

        foreach ($series as $seriesIndex => $s) {
            for ($volume = 1; $volume <= 5; $volume++) {
                $books[] = [
                    'title' => $s['base_title'] . ' — Vol. ' . str_pad((string) $volume, 2, '0', STR_PAD_LEFT),
                    'author' => $s['author'],
                    'description' => 'A structured, academic-style volume with exercises, summaries, and practical examples.',
                    'price' => $s['base_price'] + ($volume * 15),
                    'year' => $s['year'],
                    'publisher' => $s['publisher'],
                    'picture' => $pics[($seriesIndex + $volume) % count($pics)],
                    'type_key' => $s['type_key'],
                ];
            }
        }

        foreach ($books as $index => $book) {
            // Stock cycles 1..5 so you can test “only 1 left”, “only a few left”, etc.
            $book['qtyInStock'] = ($index % 5) + 1;

            $typeId = $typeMap[$book['type_key']] ?? null;
            if (!$typeId) {
                // Fallback to a known type if something is mis-keyed.
                $typeId = reset($typeMap);
            }

            $payload = $book;
            unset($payload['type_key']);
            $payload['type_id'] = $typeId;

            Books::updateOrCreate(
                ['title' => $book['title'], 'author' => $book['author']],
                $payload
            );
        }
    }
}

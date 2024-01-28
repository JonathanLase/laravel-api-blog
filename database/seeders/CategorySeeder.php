<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'id'   => Str::uuid(),
                'name' => 'Laravel',
                'slug' => 'laravel',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'PHP',
                'slug' => 'php',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'JavaScript',
                'slug' => 'javascript',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Vue.js',
                'slug' => 'vue-js',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'React.js',
                'slug' => 'react-js',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Node.js',
                'slug' => 'node-js',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Python',
                'slug' => 'python',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Django',
                'slug' => 'django',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Flask',
                'slug' => 'flask',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Ruby',
                'slug' => 'ruby',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Ruby on Rails',
                'slug' => 'ruby-on-rails',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Java',
                'slug' => 'java',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Spring',
                'slug' => 'spring',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Kotlin',
                'slug' => 'kotlin',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Android',
                'slug' => 'android',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'iOS',
                'slug' => 'ios',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Swift',
                'slug' => 'swift',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Dart',
                'slug' => 'dart',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Flutter',
                'slug' => 'flutter',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Go',
                'slug' => 'go',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'Rust',
                'slug' => 'rust',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'C',
                'slug' => 'c',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'C++',
                'slug' => 'c++',
            ],
            [
                'id'   => Str::uuid(),
                'name' => 'C#',
                'slug' => 'c#',
            ],
        ];

        foreach ($category as $data) {
            Category::insert($data);
        }
    }
}

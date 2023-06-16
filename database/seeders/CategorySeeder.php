<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'PHP',
                'slug' => \Str::slug('PHP'),
                'created_at' => now(),
            ],
            [
                'name' => 'Python',
                'slug' => \Str::slug('Python'),
                'created_at' => now(),
            ],
            [
                'name' => 'Java',
                'slug' => \Str::slug('Java'),
                'created_at' => now(),
            ],
            [
                'name' => 'C++',
                'slug' => \Str::slug('C++'),
                'created_at' => now(),
            ],
            [
                'name' => 'Ruby',
                'slug' => \Str::slug('Ruby'),
                'created_at' => now(),
            ],
        ];
        Category::insert($data);
    }
}
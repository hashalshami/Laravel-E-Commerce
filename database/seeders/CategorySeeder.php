<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'cat_name' => 'رجالي',
            // 'cat_image' => 'test/man.jfif'
        ]);

        // 2
        Category::create([
            'cat_name' => 'نسائي',
            // 'cat_image' => 'test/woman.jfif'
        ]);

        // 3
        Category::create([
            'cat_name' => 'شبابي',
            // 'cat_image' => 'test/yman.jfif'
        ]);

        // 4
        Category::create([
            'cat_name' => 'اطفال',
            // 'cat_image' => 'test/child.jfif'
        ]);

        // 5
        Category::create([
            'cat_name' => 'بناتي',
            // 'cat_image' => 'test/f8.jpg'
        ]);
    }
}

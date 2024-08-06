<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'شميز رجالي ',
            'description' => 'شميز مميز بمقاسات متعددة والوان مناسبة',
            'price' => 12000,
            // 'image' => 'test/f2.jpg',
            'cat_id' => 1,
        ]);
       

        Product::create([
            'name' => 'شميز رجالي ',
            'description' => 'شميز مميز بمقاسات متعددة والوان مناسبة',
            'price' => 2000,
            'cat_id' => 1,
        ]);
       
        Product::create([
            'name' => ' سترة نسائية  ',
            'description' => 'سترة مميزة بمقاسات متعددة والوان مناسبة',
            'price' => 4000,
            'cat_id' => 2,
        ]);
        Product::create([
            'name' => ' سترة نسائية  ',
            'description' => 'سترة مميزة بمقاسات متعددة والوان مناسبة',
            'price' => 4000,
            'cat_id' => 2,
        ]);
        Product::create([
            'name' => ' سترة نسائية  ',
            'description' => 'سترة مميزة بمقاسات متعددة والوان مناسبة',
            'price' => 4000,
            'cat_id' => 2,
        ]);
        
    }
}

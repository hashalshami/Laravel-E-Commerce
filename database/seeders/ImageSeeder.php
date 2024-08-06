<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::create([
            'path' => 'test/f2.jpg',
            'color' => '#007400',
            'pro_id' => 1
        ]);
        Image::create([
            'path' => 'test/f1.jpg',
            'color' => '#687400',
            'pro_id' => 1
        ]);
        Image::create([
            'path' => 'test/f3.jpg',
            'color' => '#a34c12',
            'pro_id' => 1
        ]);
        // 
        Image::create([
            'path' => 'test/f4.jpg',
            'color' => '#a34c12',
            'pro_id' => 2
        ]);
        Image::create([
            'path' => 'test/f5.jpg',
            'color' => '#827467',
            'pro_id' => 2
        ]);
        Image::create([
            'path' => 'test/f6.jpg',
            'color' => '#936874',
            'pro_id' => 2
        ]);
        // 

        Image::create([
            'path' => 'test/f8.jpg',
            'color' => '#a34c12',
            'pro_id' => 3
        ]);
        Image::create([
            'path' => 'test/f7.jpg',
            'color' => '#827467',
            'pro_id' => 3
        ]);
        Image::create([
            'path' => 'test/n3.jpg',
            'color' => '#936874',
            'pro_id' => 3
        ]);
        // 
        Image::create([
            'path' => 'test/f8.jpg',
            'color' => '#a34c12',
            'pro_id' => 4
        ]);
        Image::create([
            'path' => 'test/f7.jpg',
            'color' => '#827467',
            'pro_id' => 4
        ]);
        Image::create([
            'path' => 'test/n3.jpg',
            'color' => '#936874',
            'pro_id' => 4
        ]);
        // 
        Image::create([
            'path' => 'test/f8.jpg',
            'color' => '#a34c12',
            'pro_id' => 5
        ]);
        Image::create([
            'path' => 'test/f7.jpg',
            'color' => '#827467',
            'pro_id' => 5
        ]);
        Image::create([
            'path' => 'test/n3.jpg',
            'color' => '#936874',
            'pro_id' => 5
        ]);
    }
}

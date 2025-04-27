<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $categories = [
        'elettronica',
        'sport',
        'casa',
        'auto',
        'alimentazione',
        'lavoro',
        'moda',
        'gioielli',
        'viaggio',
        'libri',
        'musica',
        'giochi',
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}

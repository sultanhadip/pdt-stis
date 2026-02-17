<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan'
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        Category::create([
            'name' => 'Infrastruktur',
            'slug' => 'infrastruktur'
        ]);
    }
}

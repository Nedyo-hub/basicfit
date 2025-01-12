<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Abonnementen'],
            ['name' => 'Openingstijden'],
            ['name' => 'Fitnessapparatuur'],
            ['name' => 'Groepslessen'],
            ['name' => 'Persoonlijke Training'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

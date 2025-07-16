<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Motoryzacja', 'icon' => 'fas fa-car'],
            ['name' => 'Nieruchomości', 'icon' => 'fas fa-home'],
            ['name' => 'Elektronika', 'icon' => 'fas fa-laptop'],
            ['name' => 'Moda', 'icon' => 'fas fa-tshirt'],
            ['name' => 'Dom i ogród', 'icon' => 'fas fa-seedling'],
            ['name' => 'Praca', 'icon' => 'fas fa-briefcase'],
        ];

        foreach ($categories as $index => $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'sort_order' => $index,
            ]);
        }
    }
}
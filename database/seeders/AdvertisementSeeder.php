<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Support\Str;

class AdvertisementSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        
        $advertisements = [
            [
                'title' => 'Sprzedam samochód Toyota Corolla 2020',
                'description' => 'Bardzo dobry stan, niski przebieg, serwisowany w ASO.',
                'price' => 65000,
                'contact_name' => 'Jan Kowalski',
                'contact_email' => 'jan@example.com',
                'contact_phone' => '+48 123 456 789',
                'location' => 'Warszawa',
                'category_id' => 1,
            ],
            [
                'title' => 'Mieszkanie 3-pokojowe do wynajęcia',
                'description' => 'Mieszkanie w centrum miasta, umeblowane, dostępne od zaraz.',
                'price' => 2500,
                'contact_name' => 'Anna Nowak',
                'contact_email' => 'anna@example.com',
                'contact_phone' => '+48 987 654 321',
                'location' => 'Kraków',
                'category_id' => 2,
            ],
            [
                'title' => 'Laptop Dell XPS 13',
                'description' => 'Laptop w bardzo dobrym stanie, używany rok.',
                'price' => 3500,
                'contact_name' => 'Piotr Wiśniewski',
                'contact_email' => 'piotr@example.com',
                'location' => 'Gdańsk',
                'category_id' => 3,
            ],
            [
                'title' => 'Kurtka zimowa Nike',
                'description' => 'Nowa kurtka, rozmiar M, oryginalna.',
                'price' => 299,
                'contact_name' => 'Maria Kowalczyk',
                'contact_email' => 'maria@example.com',
                'location' => 'Poznań',
                'category_id' => 4,
            ],
        ];

        foreach ($advertisements as $ad) {
            Advertisement::create([
                'title' => $ad['title'],
                'slug' => Str::slug($ad['title']),
                'description' => $ad['description'],
                'price' => $ad['price'],
                'currency' => 'PLN',
                'contact_name' => $ad['contact_name'],
                'contact_email' => $ad['contact_email'],
                'contact_phone' => $ad['contact_phone'] ?? null,
                'location' => $ad['location'],
                'category_id' => $ad['category_id'],
                'status' => 'active',
                'is_featured' => rand(0, 1) == 1,
            ]);
        }
    }
}
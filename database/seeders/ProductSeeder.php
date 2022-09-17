<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Product;
  
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'fall',
                'description' => 'Fall',
                'image' => 'https://image.tmdb.org/t/p/w500//v28T5F1IygM8vXWZIycfNEm3xcL.jpg',
                'price' => 50
            ],
            [
                'name' => 'Dragon ball Z',
                'description' => 'Dragon ball Z',
                'image' => 'https://image.tmdb.org/t/p/w500//rugyJdeoJm7cSJL1q4jBpTNbxyU.jpg',
                'price' => 55
            ],
            [
                'name' => 'Thor',
                'description' => 'Thor',
                'image' => 'https://image.tmdb.org/t/p/w500//pIkRyD18kl4FhoCNQuWxWu5cBLM.jpg',
                'price' => 40
            ],
            [
                'name' => 'Samaritan',
                'description' => 'Samaritan',
                'image' => 'https://image.tmdb.org/t/p/w500//vwq5iboxYoaSpOmEQrhq9tHicq7.jpg',
                'price' => 25
            ],
            [
                'name' => 'Fullmetal',
                'description' => 'Fullmetal',
                'image' => 'https://image.tmdb.org/t/p/w500//c5OwwBNyJkwyroIOIJL9IiRjydR.jpg',
                'price' => 20
            ]
        ];
  
        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
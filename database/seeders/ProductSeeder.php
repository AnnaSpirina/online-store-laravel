<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => Str::random(10),
                'price' => rand(100, 1000),
                'stock' => rand(0, 20),
                'image' => strval($i+1) . ".jpg",
            ]);
        }
    }
}
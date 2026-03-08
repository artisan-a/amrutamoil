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
            'name' => 'Amrutam Cold Pressed Groundnut Oil',
            'size' => '1 KG Bottle',
            'description' => 'Pure and traditional cold pressed groundnut oil in a convenient 1 KG bottle. Perfect for daily use.',
            'price' => 250.00,
            'image' => 'products/1kg-bottle.jpg'
        ]);

        Product::create([
            'name' => 'Amrutam Cold Pressed Groundnut Oil',
            'size' => '5 KG Tin',
            'description' => 'A 5 KG tin of pure cold pressed groundnut oil. Ideal for families.',
            'price' => 1200.00,
            'image' => 'products/5kg-tin.jpg'
        ]);

        Product::create([
            'name' => 'Amrutam Cold Pressed Groundnut Oil',
            'size' => '15 KG Tin',
            'description' => 'Bulk 15 KG tin for large families and commercial use. Authentic cold pressed groundnut oil.',
            'price' => 3500.00,
            'image' => 'products/15kg-tin.jpg'
        ]);
    }
}
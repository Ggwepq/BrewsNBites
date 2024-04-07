<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'title' => 'Itlog ni Jollibee',
            'price' => 123542.25,
            'quantity' => 1,
            'category_id' => 2,
            'brand_id' => 1,
            'description' => 'Ang itlog ni jollibee ay isang napakahiwagang substance na natatagpuan sa planetaang jollitown.'
        ]);
    }
}

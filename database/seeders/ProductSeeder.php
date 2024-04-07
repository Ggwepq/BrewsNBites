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
            'title' => 'Product 1',
            'price' => 12,
            'quantity' => 999,
            'category_id' => 2,
            'brand_id' => 1,
            'description' => 'Consequat ullamco pariatur et veniam ea sit. Ad dolore officia dolore ipsum enim est velit pariatur duis esse labore velit sint Lorem. Cupidatat esse ea duis laborum. Nulla adipisicing laborum do anim eu commodo proident cupidatat. Nisi cillum magna aute commodo commodo minim duis nulla laborum nostrud pariatur exercitation.'
        ]);
    }
}

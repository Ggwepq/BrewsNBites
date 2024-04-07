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
            'title' => 'Nisi adipisicing reprehenderit et labore ipsum cillum cillum enim amet consequat fugiat nulla consectetur.',
            'price' => 1000.29,
            'quantity' => 10,
            'category_id' => 1,
            'brand_id' => 2,
            'description' => 'Sint voluptate qui qui nulla voluptate ex et aute velit cillum non aute commodo. Occaecat adipisicing consequat veniam duis commodo. Cupidatat sit qui ullamco occaecat sunt culpa ut amet aliqua Lorem. Aliqua est eu nulla eu deserunt anim sint et eiusmod est proident irure officia. Eu do laborum laborum culpa deserunt duis duis et id cupidatat ad dolore non aliquip.'
        ]);
    }
}

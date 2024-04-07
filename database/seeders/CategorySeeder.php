<?php

namespace Database\Seeders;

use App\Models\Catergory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catergory::create([
            'name' => 'Drinks',
            'slug' => 'drinks'
        ]);
        Catergory::create([
            'name' => 'Food',
            'slug' => 'food'
        ]);
        Catergory::create([
            'name' => 'Pastries',
            'slug' => 'pastries'
        ]);
        Catergory::create([
            'name' => 'Beans',
            'slug' => 'beans'
        ]);
    }
}

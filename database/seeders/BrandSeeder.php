<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'BrewsNBites',
            'slug' => 'brewsnbites'
        ]);
        Brand::create([
            'name' => 'Starbucks',
            'slug' => 'starbucks'
        ]);
        Brand::create([
            'name' => 'Big Brew',
            'slug' => 'big-brew'
        ]);
    }
}

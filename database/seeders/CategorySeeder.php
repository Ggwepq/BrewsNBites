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
            'name' => 'Coffee',
            'slug' => 'coffee'
        ]);
        Catergory::create([
            'name' => 'Desserts',
            'slug' => 'desserts'
        ]);
        Catergory::create([
            'name' => 'Foods',
            'slug' => 'foods'
        ]);
    }
}

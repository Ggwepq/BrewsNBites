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
            'name' => 'Iced Coffe',
            'slug' => 'iced-coffee'
        ]);
        Catergory::create([
            'name' => 'Hot Coffee',
            'slug' => 'hot-coffee'
        ]);
        Catergory::create([
            'name' => 'Frappe',
            'slug' => 'frappe'
        ]);
        Catergory::create([
            'name' => 'Tea',
            'slug' => 'tea'
        ]);
    }
}

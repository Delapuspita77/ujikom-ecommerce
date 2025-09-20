<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Categories::insert([
            ['name' => 'Obat', 'description' => 'Berbagai macam obat kesehatan'],
            ['name' => 'Alat Kesehatan', 'description' => 'Peralatan medis untuk kebutuhan rumah tangga'],
            ['name' => 'Vitamin & Suplemen', 'description' => 'Untuk menjaga daya tahan tubuh'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Vitamin C 500mg',
                'description' => 'Vitamin C untuk meningkatkan daya tahan tubuh.',
                'price' => 120000,
                'image' => 'vitamin_c.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Masker Medis 50pcs',
                'description' => 'Masker medis sekali pakai, nyaman dan aman.',
                'price' => 75000,
                'image' => 'masker_medis.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Thermometer Digital',
                'description' => 'Thermometer digital akurat dan mudah digunakan.',
                'price' => 150000,
                'image' => 'thermometer.jpg',
                'category_id' => 3,
            ],
            [
                'name' => 'Hand Sanitizer 100ml',
                'description' => 'Hand sanitizer dengan kandungan alkohol 70%.',
                'price' => 30000,
                'image' => 'hand_sanitizer.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Obat Flu Herbal',
                'description' => 'Obat herbal untuk meredakan gejala flu.',
                'price' => 45000,
                'image' => 'obat_flu.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Kapas Medis 100gr',
                'description' => 'Kapas medis steril untuk keperluan medis.',
                'price' => 15000,
                'image' => 'kapas_medis.jpg',
                'category_id' => 2,
            ],
            [
                'name' => 'Alat Pengukur Tekanan Darah',
                'description' => 'Alat digital untuk mengukur tekanan darah.',
                'price' => 350000,
                'image' => 'tensi.jpg',
                'category_id' => 3,
            ],
            [
                'name' => 'Salep Luka',
                'description' => 'Salep untuk mempercepat penyembuhan luka.',
                'price' => 25000,
                'image' => 'salep_luka.jpg',
                'category_id' => 1,
            ],
            [
                'name' => 'Vitamin D 1000 IU',
                'description' => 'Vitamin D untuk kesehatan tulang dan imun.',
                'price' => 130000,
                'image' => 'vitamin_d.jpg',
                'category_id' => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

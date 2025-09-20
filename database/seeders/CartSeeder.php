<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     *
     * @return void
     */
    public function run()
    {
        $carts = [
            [
                'user_id' => 1, // pastikan user_id ini ada
                'product_id' => 1,
                'quantity' => 2,
            ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
            ],
            [
                'user_id' => 2, // user lain
                'product_id' => 3,
                'quantity' => 3,
            ],
        ];

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}

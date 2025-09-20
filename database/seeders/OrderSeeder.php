<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $order = Order::create([
            'user_id' => 2, // customer
            'address' => 'Jl. Contoh Alamat No. 123', // <-- tambahkan ini
            'total'   => 65000,
            'status'  => 'paid',
        ]);


        $order->products()->attach(1, ['quantity' => 2, 'price' => 15000]);
        $order->products()->attach(2, ['quantity' => 1, 'price' => 75000]);
    }
}

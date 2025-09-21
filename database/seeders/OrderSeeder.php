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
            'user_id' => 2,
            'address' => 'Jl. Contoh Alamat No. 123',
            'total'   => 65000,
            'status'  => 'waiting_verification',  // status pembayaran
            'status_order' => 'paid',             // status order
            ]);

        $order->products()->attach(1, ['quantity' => 2, 'price' => 15000]);
        $order->products()->attach(2, ['quantity' => 1, 'price' => 75000]);
    }
}

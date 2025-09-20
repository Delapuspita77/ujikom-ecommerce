<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            Payment::create([
                'order_id' => $order->id,
                'amount'   => $order->total,
                'method'   => $order->payment_method ?? 'bank_transfer',
                'status'   => $order->status === 'paid' ? 'success' : 'pending',
            ]);
        }
    }
}

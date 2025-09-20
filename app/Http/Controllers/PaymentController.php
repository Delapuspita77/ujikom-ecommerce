<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    // 1. Tampilkan halaman pembayaran
    public function show(Order $order)
    {
        return view('checkout.payment', compact('order'));
    }

    // 2. Proses pembayaran
    public function pay(Request $request, Order $order)
    {
        $request->validate([
            'method' => 'required|string',
        ]);

        Payment::create([
            'order_id' => $order->id,
            'method'   => $request->method,
            'amount'   => $order->total,
            'status'   => 'paid',
        ]);

        $order->update(['status' => 'paid']);

        return redirect()->route('invoice.show', $order->id)
                         ->with('success', 'Payment successful! Invoice generated.');
    }
}


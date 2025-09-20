<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment; // ✅ tambahkan model Payment

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:500',
            'payment_method' => 'required|string',
        ]);

        $total = collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']);

        // Simpan Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'address' => $request->address,
            'status'  => 'pending', // 🔥 semua default pending
            'total'   => $total,
            'payment_method' => $request->payment_method,
        ]);

        // ✅ Simpan Payment juga
        Payment::create([
            'order_id' => $order->id,
            'amount'   => $total,
            'method'   => $request->payment_method,
            'status'   => $request->payment_method === 'cod' ? 'success' : 'pending',
        ]);

        session()->forget('cart');

        // Alur sesuai metode pembayaran
        if ($request->payment_method === 'bank_transfer' || $request->payment_method === 'credit_card') {
            return view('checkout.payment', compact('order'));
        }

        if ($request->payment_method === 'cod') {
            return redirect()->route('orders.index')
                ->with('success', 'Order placed successfully with Cash on Delivery.');
        }

        return redirect()->route('orders.index')
            ->with('success', 'Order placed! Please check your transaction list.');
    }
}

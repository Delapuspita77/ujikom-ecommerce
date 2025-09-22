<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

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
            'address'        => 'required|string|max:500',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Simpan Order
        $order = Order::create([
            'user_id'      => auth()->id(),
            'address'      => $request->address,
            'total'        => $total,
            'status'       => 'unpaid',   // status pembayaran default
            'status_order' => 'pending',  // status order default
        ]);

        // ✅ Simpan item order (ke tabel order_items)
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        // ✅ Simpan Payment
        Payment::create([
            'order_id' => $order->id,
            'amount'   => $total,
            'method'   => $request->payment_method,
            'status'   => $request->payment_method === 'cod' ? 'success' : 'pending',
        ]);

        // Kosongkan cart
        session()->forget('cart');

        // Alur sesuai metode pembayaran
        if (in_array($request->payment_method, ['bank_transfer', 'credit_card'])) {
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

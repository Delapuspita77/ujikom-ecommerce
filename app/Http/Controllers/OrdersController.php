<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function confirm($id)
    {
    $order = Order::where('user_id', auth()->id())->findOrFail($id);

    // Update status jadi paid
    $order->update(['status' => 'paid']);

    return redirect()->route('orders.index')->with('success', 'Payment confirmed successfully!');
    }

}

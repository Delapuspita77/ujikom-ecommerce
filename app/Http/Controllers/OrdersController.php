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

    public function cancel($id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);

        if ($order->status_order === 'pending') {
            $order->update([
                'status_order' => 'cancelled',
                'status'       => 'cancelled',
            ]);
            return redirect()->route('orders.index')->with('success', 'Order has been cancelled.');
        }

        return back()->with('error', 'This order cannot be cancelled.');
    }

    public function confirm($id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);

        if ($order->status_order === 'pending') {
            $order->update([
                'status_order' => 'paid',
                'status'       => 'waiting_verification',
            ]);
            return redirect()->route('orders.index')->with('success', 'Payment confirmation submitted. Waiting for admin verification.');
        }

        return back()->with('error', 'This order cannot be confirmed.');
    }



}

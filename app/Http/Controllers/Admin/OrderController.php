<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user','products')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Order $order)
    {
        $order->update(['status' => request('status')]);
        return redirect()->route('admin.orders.index')->with('success', 'Order status updated!');
    }

    public function accept($id)
    {
        $order = Order::with('payment')->findOrFail($id);

        if ($order->payment && $order->payment->method === 'cod') {
            // Untuk COD, admin bisa accept meskipun belum paid
            $order->update([
                'status_order' => 'processed',
                'status'       => 'unpaid', // pakai enum yang sudah ada
            ]);
            return back()->with('success', 'COD order accepted. Waiting for delivery.');
        }

        if ($order->status_order === 'paid') {
            $order->update([
                'status_order' => 'processed',
                'status'       => 'verified',
            ]);
            return back()->with('success', 'Order accepted and payment verified.');
        }

        return back()->with('error', 'Only paid or COD orders can be accepted.');
    }


    public function reject($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status_order === 'paid') {
            $order->update([
                'status_order' => 'rejected',
                'status'       => 'failed',
            ]);
            return back()->with('success', 'Order has been rejected.');
        }

        return back()->with('error', 'Only paid orders can be rejected.');
    }

    public function ship($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status_order === 'processed') {
            $order->update([
                'status_order' => 'shipped',
            ]);
        }

        return redirect()->route('admin.orders.index')->with('success', 'Order has been shipped!');
    }
}

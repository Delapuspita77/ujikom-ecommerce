<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function show($order_id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($order_id);
        return view('checkout.invoice', compact('order'));
    }

    public function invoice($id)
    {
        $order = Order::with('products', 'user')->findOrFail($id);

        $pdf = Pdf::loadView('orders.invoice', compact('order'))->setPaper('a4');
        return $pdf->stream("invoice_order_{$order->id}.pdf");
    }
}
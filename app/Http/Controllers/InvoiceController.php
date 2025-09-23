<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function show($order_id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($order_id);
        return view('checkout.invoice', compact('order'));
    }

    public function invoice($id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($id);

        $pdf = Pdf::loadView('orders.invoice', compact('order'))->setPaper('a4');
        return $pdf->stream("invoice_order_{$order->id}.pdf");
    }

    public function sendInvoice($id)
    {
        $order = Order::with('user')->findOrFail($id);

        // Jika bukan admin, pastikan order ini milik user yang login
        if (auth()->user()->role !== 'admin' && $order->user_id !== auth()->id()) {
            abort(403, 'Anda tidak boleh mengirim invoice untuk order ini.');
        }

        // Ambil PDF invoice dari method invoice() yang sudah ada
        $pdf = $this->invoice($id)->getOriginalContent();

        // Kirim email ke user
        Mail::to($order->user->email)->send(new InvoiceMail($order, $pdf));

        return back()->with('success', 'Invoice berhasil dikirim ke email ' . $order->user->email);
    }



}
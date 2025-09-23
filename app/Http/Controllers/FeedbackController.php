<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Http\Request;
use App\Models\Product;

class FeedbackController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $user = auth()->user();

        // Cek apakah user punya order shipped untuk produk ini
        $hasShippedOrder = $user->orders()
            ->where('status_order', 'shipped')
            ->whereHas('items', function ($q) use ($product) {
                $q->where('product_id', $product->id);
            })
            ->exists();

        if (! $hasShippedOrder) {
            return back()->with('error', 'Anda hanya bisa memberikan feedback jika sudah membeli dan order Anda shipped.');
        }

        // Simpan feedback
        $user->feedbacks()->create([
            'product_id' => $product->id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return back()->with('success', 'Feedback berhasil dikirim.');
    }
}

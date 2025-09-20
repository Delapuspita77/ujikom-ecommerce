@extends('layouts.app')

@section('title', 'Your Cart - Ecommerce Healthcare')

@section('content')
    <h1 style="margin-bottom: 1.5rem; font-weight: 700; font-size: 2rem; color: #2c3e50;">Your Cart</h1>

    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #ddd;">
                    <th style="text-align: left; padding: 0.75rem;">Product</th>
                    <th style="text-align: center; padding: 0.75rem;">Quantity</th>
                    <th style="text-align: right; padding: 0.75rem;">Price</th>
                    <th style="text-align: right; padding: 0.75rem;">Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 0.75rem;">{{ $item['name'] }}</td>
                        <td style="text-align: center; padding: 0.75rem;">{{ $item['quantity'] }}</td>
                        <td style="text-align: right; padding: 0.75rem;">Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td style="text-align: right; padding: 0.75rem;">Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td style="text-align: center; padding: 0.75rem;">
                            <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Remove this item?');">
                                @csrf
                                @method('POST')
                                <button type="submit" style="background: transparent; border: none; color: #e74c3c; cursor: pointer;">&times;</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right; font-weight: 700; padding: 0.75rem;">Total:</td>
                    <td style="text-align: right; font-weight: 700; padding: 0.75rem;">Rp{{ number_format($total, 0, ',', '.') }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div style="margin-top: 2rem; text-align: right;">
            <a href="{{ route('checkout.index') }}" style="background: #007bff; color: white; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: 700; text-decoration: none;">
                Proceed to Checkout
            </a>
        </div>
    @endif
@endsection

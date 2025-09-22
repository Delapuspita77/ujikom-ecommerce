@extends('layouts.app')

@section('title', 'Your Cart - My Pharmacy')

@section('content')
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Your Cart</h1>

    @if(empty($cart))
        <p class="text-gray-600">Your cart is empty.</p>
    @else
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="text-left px-4 py-3">Product</th>
                        <th class="text-center px-4 py-3">Quantity</th>
                        <th class="text-right px-4 py-3">Price</th>
                        <th class="text-right px-4 py-3">Subtotal</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity']; 
                            $total += $subtotal; 
                        @endphp
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-gray-800">{{ $item['name'] }}</td>
                            <td class="text-center px-4 py-3">{{ $item['quantity'] }}</td>
                            <td class="text-right px-4 py-3">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="text-right px-4 py-3">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="text-center px-4 py-3">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" 
                                      onsubmit="return confirm('Remove this item?');" class="inline">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" 
                                            class="text-red-500 hover:text-red-700 font-bold text-lg transition">
                                        &times;
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-50 font-bold text-gray-900">
                        <td colspan="3" class="text-right px-4 py-3">Total:</td>
                        <td class="text-right px-4 py-3">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('checkout.index') }}" 
               class="inline-block rounded-md bg-teal-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm 
                      hover:bg-teal-500 hover:shadow-md transition duration-300 ease-in-out">
                Proceed to Checkout
            </a>
        </div>
    @endif
@endsection

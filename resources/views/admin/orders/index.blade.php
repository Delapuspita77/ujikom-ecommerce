@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Orders</h1>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-50 text-left text-gray-700">
                    <th class="p-3 border">Order ID</th>
                    <th class="p-3 border">User</th>
                    <th class="p-3 border">Total</th>
                    <th class="p-3 border">Order Status</th>
                    <th class="p-3 border">Payment Status</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 border font-medium text-gray-800">#{{ $order->id }}</td>
                    <td class="p-3 border">{{ $order->user->name }}</td>
                    <td class="p-3 border font-semibold text-teal-600">
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </td>
                    <td class="p-3 border">
                        <span class="px-2 py-1 text-sm rounded 
                            @if($order->status_order === 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status_order === 'processed') bg-blue-100 text-blue-700
                            @elseif($order->status_order === 'shipped') bg-teal-100 text-teal-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ ucfirst($order->status_order) }}
                        </span>
                    </td>
                    <td class="p-3 border">
                        <span class="px-2 py-1 text-sm rounded 
                            @if($order->status === 'paid') bg-green-100 text-green-700
                            @elseif($order->status === 'unpaid') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="p-3 border space-x-2">
                        {{-- Jika status order "paid", admin bisa Accept / Reject --}}
                        @if($order->status_order === 'paid')
                            <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                    class="bg-green-500 text-white px-3 py-1 rounded-md text-sm hover:bg-green-600 transition">
                                    Accept
                                </button>
                            </form>
                            <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                    class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition">
                                    Reject
                                </button>
                            </form>
                        @elseif($order->status_order === 'processed')
                            {{-- Jika sudah diterima admin, tampilkan tombol Ship --}}
                            <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" 
                                    class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition">
                                    Ship
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500 text-sm italic">No actions</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

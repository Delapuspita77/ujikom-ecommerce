@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Orders</h1>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 border">Order ID</th>
                <th class="p-2 border">User</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Order Status</th>
                <th class="p-2 border">Payment Status</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="p-2 border">#{{ $order->id }}</td>
                <td class="p-2 border">{{ $order->user->name }}</td>
                <td class="p-2 border">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                <td class="p-2 border">{{ ucfirst($order->status_order) }}</td>
                <td class="p-2 border">{{ ucfirst($order->status) }}</td>
                <td class="p-2 border">
                    {{-- Jika status order "paid", admin bisa Accept / Reject --}}
                    @if($order->status_order === 'paid')
                        <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Accept</button>
                        </form>
                        <form action="{{ route('admin.orders.reject', $order->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Reject</button>
                        </form>
                    @elseif($order->status_order === 'processed')
                        {{-- Jika sudah diterima admin, tampilkan tombol Ship --}}
                        <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Ship</button>
                        </form>
                    @else
                        <span class="px-2 py-1 rounded bg-gray-300">
                            {{ ucfirst($order->status_order) }}
                        </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

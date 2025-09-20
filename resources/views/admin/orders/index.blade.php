@extends('layouts.admin')

@section('title', 'Manage Orders')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Orders</h1>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">User</th>
                <th class="p-2 border">Total</th>
                <th class="p-2 border">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50">
                <td class="p-2 border">#{{ $order->id }}</td>
                <td class="p-2 border">{{ $order->user->name }}</td>
                <td class="p-2 border">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                <td class="p-2 border">{{ ucfirst($order->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

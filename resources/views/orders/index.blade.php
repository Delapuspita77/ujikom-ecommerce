@extends('layouts.app')

@section('title', 'My Orders - Ecommerce Healthcare')

@section('content')
    <h1 style="margin-bottom: 1.5rem; font-weight: 700; font-size: 2rem; color: #2c3e50;">
        My Orders
    </h1>

    @if(session('success'))
        <div style="background:#d4edda; color:#155724; padding:1rem; border-radius:6px; margin-bottom:1rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())     
        <p>You don’t have any orders yet.</p>
    @else
        <table style="width:100%; border-collapse: collapse; margin-top:1rem;">
            <thead>
                <tr style="background:#f8f9fa; text-align:left;">
                    <th style="padding:0.75rem; border-bottom:1px solid #ddd;">Order ID</th>
                    <th style="padding:0.75rem; border-bottom:1px solid #ddd;">Total</th>
                    <th style="padding:0.75rem; border-bottom:1px solid #ddd;">Status</th>
                    <th style="padding:0.75rem; border-bottom:1px solid #ddd;">Payment</th>
                    <th style="padding:0.75rem; border-bottom:1px solid #ddd;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td style="padding:0.75rem; border-bottom:1px solid #ddd;">
                            #{{ $order->id }}
                        </td>
                        <td style="padding:0.75rem; border-bottom:1px solid #ddd;">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </td>
                        <td style="padding:0.75rem; border-bottom:1px solid #ddd;">
                            {{ ucfirst($order->status) }}
                        </td>
                        <td style="padding:0.75rem; border-bottom:1px solid #ddd;">
                            {{ $order->payment ? ucfirst(str_replace('_',' ', $order->payment->method)) : '-' }}
                        </td>
                        <td style="padding:0.75rem; border-bottom:1px solid #ddd;">
                            <!-- Tombol Confirm Payment kalau masih pending -->
                            @if($order->status === 'pending')
                                <form action="{{ route('orders.confirm', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" 
                                        style="margin-left: 0.5rem; background: #28a745; color:white; border:none; padding:0.25rem 0.75rem; border-radius:4px; cursor:pointer;">
                                        Confirm
                                    </button>
                                </form>
                            @endif
                            <!-- Tombol View selalu tampil -->
                            <a href="{{ route('orders.show', $order->id) }}" 
                            style="background:#007bff; color:white; padding:0.5rem 1rem; border-radius:4px; text-decoration:none; margin-left:0.5rem;">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
@endsection

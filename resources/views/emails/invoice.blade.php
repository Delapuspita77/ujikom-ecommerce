<p>Halo {{ $order->user->name }},</p>

<p>Terima kasih sudah melakukan pemesanan. Invoice Anda terlampir di email ini.</p>

<p><strong>Order ID:</strong> #{{ $order->id }}<br>
<strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>

<p>Salam,<br>
<b>My Pharmacy</b></p>

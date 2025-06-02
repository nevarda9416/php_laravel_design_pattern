@foreach ($orders as $order)
    <div style="page-break-after: always;">
        <h3>Order #{{ $order->id }}</h3>
        <p>Khách hàng: {{ $order->customer_name }}</p>
        <p>Tổng tiền: {{ number_format($order->total, 0, ',', '.') }} VND</p>
    </div>
@endforeach

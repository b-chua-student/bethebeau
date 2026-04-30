@extends('layouts.app')
@section('title', 'Order Confirmation')
@section('content')
<h1>Order Confirmation</h1>
<p>Your order has been placed!</p>
<p>Order ID: {{ $order->id }}</p>

<h3>Order Summary</h3>
<table>
    <tr>
        <th>Product</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>
    @foreach ($order->items as $item)
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->unit_price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->unit_price * $item->quantity }}</td>
    </tr>
    @endforeach
</table>

<p>Subtotal: {{ $subtotal }}</p>
<p>Shipping: {{ $shipping }}</p>
<p>Tax (12%): {{ number_format($tax, 2) }}</p>
<p>Total: {{ $total }}</p>

<p>Shipped To: {{ $order->shipped_to }}</p>
<p>Status: {{ ucfirst($order->status) }}</p>

<a href='{{ route('app.homepage') }}'>Back to Homepage</a>
@endsection

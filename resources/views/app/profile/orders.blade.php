@extends('layouts.app')

@section('title', 'My Orders')

@section('content')

<h3>My Orders</h3>
<table>
    <tr>
        <th>#</th>
        <th>Order ID</th>
        <th>Status</th>
        <th>Total</th>
        <th>Ordered At</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $order->id }}</td>
        <td>{{ ucfirst($order->status) }}</td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->ordered_at }}</td>
    </tr>
    @endforeach
</table>

@endsection

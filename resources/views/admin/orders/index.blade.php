@extends('layouts.admin')

@section('title', 'Order Management')

@section('content')
<h1>Order Management</h1>

<a href="{{ route('admin.orders.create') }}">Add Order</a>

<x-search-form route='orders-management'/>

<table>
  <tr>
    <th>#</th>
    <th>ID</th>
    <th>Customer Name</th>
    <th>Email</th>
    <th>Shipped To</th>
    <th>Status</th>
    <th>Total Price</th>
    <th>Order Items</th>
    <th>Ordered At</th>
    <th>Updated At</th>
  </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $order->id }}</td>
        <td>{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
        <td>{{ $order->email }}</td>
        <td>{{ $order->shipped_to }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->total_price }}</td>
        <td>
            @foreach ($order->items as $item)
                {{ $item->product->name }} x{{ $item->quantity }}<br>
            @endforeach
        </td>
        <td>{{ $order->ordered_at }}</td>
        <td>{{ $order->updated_at }}</td>
        <td>
            <a href="{{ route('admin.orders.edit', $order->id) }}">Edit</a>
            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection

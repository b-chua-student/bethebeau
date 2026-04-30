@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
<h1>Checkout</h1>

<form method='POST' action='{{ route('app.process-checkout') }}'>
    @csrf
    <h3>Shipping Details</h3>
    <input type='text' name='shipped_to' placeholder='Shipping Address' value='{{ $user->address }}' required/>

    <h3>Order Summary</h3>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->price * $item->quantity }}</td>
        </tr>
        @endforeach
    </table>

    <p>Subtotal: {{ $subtotal }}</p>
    <p>Shipping: {{ $shipping }}</p>
    <p>Tax (12%): {{ $tax }}</p>
    <p>Total: {{ $total }}</p>

    <button type='submit'>Place Order</button>
</form>
@endsection

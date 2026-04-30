@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<h1>Shopping Cart</h1>

<table>
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th>Action</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->product->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->product->price * $item->quantity }}</td>
        <td>
            <form action="{{ route('app.remove-from-cart', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Remove</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<p>Total: {{ $items->sum(fn($item) => $item->product->price * $item->quantity) }}</p>

<a href='{{ route('app.checkout') }}'>Checkout</a>
@endsection


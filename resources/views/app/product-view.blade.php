@extends('layouts.app')

@section('title', 'Product View')

@section('content')
<h1>Product View</h1>

<a href='{{ route('app.product-listing' )}}'>Back to Products</a>

<ul>
    <li>{{ $product->name }}</li>
    <li>{{ $product->category->name }}</li>
    <li>{{ $product->description }}</li>
    <li>{{ $product->price }}</li>
    <li>{{ $product->stock }}</li>
</ul>

<form method='POST' action='{{ route('app.add-to-cart') }}'>
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}"/>
    <button type="button" onclick="decrement()">-</button>
    <input type="number" name="quantity" value="1" min="1" id="quantity"/>
    <button type="button" onclick="increment()">+</button>
    <button type="submit">Add to Cart</button>
</form>

<script>
function increment() {
    document.getElementById('quantity').stepUp();
}
function decrement() {
    document.getElementById('quantity').stepDown();
}
</script>

@endsection


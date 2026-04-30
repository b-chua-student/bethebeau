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

@endsection


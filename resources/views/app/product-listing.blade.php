@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<h1>Product Listing</h1>

<x-search-form route='product-listing'/>

    @foreach ($products as $product)

    <div>
        <ul>
            <li>{{ $product->name }}</li>
            <li>{{ $product->category->name }}</li>
            <li>{{ $product->description }}</li>
            <li>{{ $product->price }}</li>
            <li>{{ $product->stock }}</li>
        </ul>
        <a href='{{ route('app.view-product', $product->id )}}'>View Product</a>
    </div>
    @endforeach

@endsection

@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<h1>Homepage</h1>
<a href='{{ route('app.shopping-cart') }}'>Shopping Cart</a>
<a href='{{ route('app.product-listing') }}'>Product Listing</a>
<form method='POST' action='{{ route('auth.logout') }}'>
    <button>Logout</button>
</form>
@endsection

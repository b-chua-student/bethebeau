@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<h1>Shopping Cart</h1>
<form method='POST' action='{{ route('app.checkout') }}'>
    <button>Checkout</button>
</form>
@endsection


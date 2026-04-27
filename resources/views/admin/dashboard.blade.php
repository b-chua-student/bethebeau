@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<form method='POST' action='{{ route('auth.logout') }}'>
    <button>Logout</button>
</form>

<div class='d-flex flex-column'>
    <a href='{{ route('admin.dashboard') }}'>Dashboard</a>
    <a href='{{ route('admin.products.index') }}'>Product Management</a>
    <a href='{{ route('admin.orders.index') }}'>Order Management</a>
    <a href='{{ route('admin.users.index') }}'>User Management</a>
</div>
@endsection


@extends('layouts.admin')

@section('title', 'Create Order')

@section('content')
<a href='{{ route('admin.orders.index') }}'>Back to Order Management</a>

<h1>Edit Order</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.orders.update', $order->id) }}'>
    @csrf
    @method('PUT')
    <select name='user_id'>
        @foreach ($users as $user)
            <option value='{{ $user->id }}' {{ $order->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }}
            </option>
        @endforeach
    </select>
    <input type='text' name='shipped_to' value='{{ $order->shipped_to }}'/>
    <select name='status'>
        @foreach (['pending','confirmed','processing','shipped','delivered','cancelled','refunded','failed'] as $status)
            <option value='{{ $status }}' {{ $order->status === $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
    <input type='number' name='total_price' value='{{ $order->total_price }}' step='0.01'/>
    <button type='submit'>Update Order</button>
</form>
@endsection



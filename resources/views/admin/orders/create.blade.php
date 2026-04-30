@extends('layouts.admin')

@section('title', 'Create Order')

@section('content')
<a href='{{ route('admin.products.index') }}'>Back to Order Management</a>

<h1>Create Order</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.orders.store') }}'>
    @csrf
    <select name='user_id'>
        @foreach ($users as $user)
            <option value='{{ $user->id }}'>{{ $user->first_name }} {{ $user->last_name }}, {{ $user->email }}</option>
        @endforeach
    </select>
    <input type='text' name='shipped_to' placeholder='Shipped To'/>
    <select name='status'>
        <option value='pending' }}>Pending</option>
        <option value='confirmed'>Confirmed</option>
        <option value='processing'>Processing</option>
        <option value='shipped'>Shipped</option>
        <option value='delivered'>Delivered</option>
        <option value='cancelled'>Cancelled</option>
        <option value='refunded'>Refunded</option>
        <option value='failed'>Failed</option>
    <input type='number' name='total_price' placeholder='Total Price' step='0.01'/>

    <h3>Order Items</h3>
    <div id="order-items">
        <div class="item-row">
            <select name="items[0][product_id]">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                @endforeach
            </select>
            <input type="number" name="items[0][quantity]" placeholder="Quantity" min="1"/>
            <input type="number" name="items[0][unit_price]" placeholder="Unit Price" step="0.01"/>
        </div>
    </div>
    <button type="button" onclick="addItem()">Add Item</button>

    <button type='submit'>Create Order</button>
</form>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<script>
let index = 1;
function addItem() {
    const div = document.createElement('div');
    div.classList.add('item-row');
    div.innerHTML = `
        <select name="items[${index}][product_id]">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        <input type="number" name="items[${index}][quantity]" placeholder="Quantity" min="1"/>
        <input type="number" name="items[${index}][unit_price]" placeholder="Unit Price" step="0.01"/>
    `;
    document.getElementById('order-items').appendChild(div);
    index++;
}
</script>

@endsection



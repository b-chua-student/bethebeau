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
    <h3>Order Items</h3>
    <div id="order-items">
        @foreach ($order->items as $index => $item)
        <div class="item-row">
            <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item->id }}"/>
            <select name="items[{{ $index }}][product_id]">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" min="1"/>
            <input type="number" name="items[{{ $index }}][unit_price]" value="{{ $item->unit_price }}" step="0.01"/>
        </div>
        @endforeach
    </div>
    <button type="button" onclick="addItem()">Add Item</button>
    <button type='submit'>Update Order</button>

<script>
let index = {{ $order->items->count() }};
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

</form>
@endsection



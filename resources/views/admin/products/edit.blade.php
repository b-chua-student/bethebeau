@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<a href='{{ route('admin.products.index') }}'>Back to Products</a>

<h1>Edit Product</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.products.update', $product->id) }}'>
    @csrf
    @method('PUT')
    <select name='category_id'>
        @foreach ($categories as $category)
            <option value='{{ $category->id }}' {{ $product->category_id === $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <input type='text' name='name' value='{{ $product->name }}'/>
    <textarea name='description'>{{ $product->description }}</textarea>
    <input type='number' name='price' value='{{ $product->price }}' step='0.01'/>
    <input type='number' name='stock' value='{{ $product->stock }}'/>
    <select name='is_active'>
        <option value='1' {{ $product->is_active ? 'selected' : '' }}>Active</option>
        <option value='0' {{ !$product->is_active ? 'selected' : '' }}>Inactive</option>
    </select>
    <button type='submit'>Update Product</button>
</form>
@endsection

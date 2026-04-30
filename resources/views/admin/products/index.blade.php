@extends('layouts.admin')

@section('title', 'Product Management')

@section('content')
<h1>Product Management</h1>

<a href="{{ route('admin.products.create') }}">Add Product</a>

<x-search-form route='product-management'/>

<table>
  <tr>
    <th>ID</th>
    <th>Category</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Active</th>
    <th>Slug</th>
    <th>Created At</th>
    <th>Updated At</th>
  </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->is_active ? 'Active' : 'Inactive' }}</td>
        <td>{{ $product->slug }}</td>
        <td>{{ $product->created_at }}</td>
        <td>{{ $product->updated_at }}</td>
        <td>
            <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection

@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<a href='{{ route('admin.products.index') }}'>Back to Product Management</a>

<h1>Create Product</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.products.store') }}'>
    @csrf
    <select name='category_id'>
        @foreach ($categories as $category)
            <option value='{{ $category->id }}'>{{ $category->name }}</option>
        @endforeach
    </select>
    <input type='text' name='name' placeholder='Name'/>
    <textarea name='description' placeholder='Description'></textarea>
    <input type='number' name='price' placeholder='Price' step='0.01'/>
    <input type='number' name='stock' placeholder='Stock'/>
    <select name='is_active'>
        <option value='1'>Active</option>
        <option value='0'>Inactive</option>
    </select>
    <button type='submit'>Create Product</button>
</form>
@endsection


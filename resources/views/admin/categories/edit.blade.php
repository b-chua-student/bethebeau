@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<a href='{{ route('admin.categories.index') }}'>Back to Category Management</a>

<h1>Edit Category</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.categories.update', $category->id) }}'>
    @csrf
    @method('PUT')
    <input type='text' name='name' value='{{ $category->name }}'/>
    <input type='text' name='slug' value='{{ $category->slug }}'/>
    <button type='submit'>Update Category</button>
</form>
@endsection

@extends('layouts.admin')

@section('title', 'Category Management')

@section('content')
<h1>Category Management</h1>

<a href="{{ route('admin.categories.create') }}">Add Category</a>

<x-search-form route='category-management'/>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Slug</th>
    <th>Created At</th>
    <th>Updated At</th>
  </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>{{ $category->created_at }}</td>
        <td>{{ $category->updated_at }}</td>
        <td>
            <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection


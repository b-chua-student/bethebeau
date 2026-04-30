@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<a href='{{ route('admin.categories.index') }}'>Back to Category Management</a>

<h1>Create Category</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.categories.store') }}'>
    @csrf
    <input type='text' name='name' placeholder='Category Name'/>
    <button type='submit'>Create Category</button>
</form>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
@endsection




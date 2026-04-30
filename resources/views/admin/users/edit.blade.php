@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<a href='{{ route('admin.users.index') }}'>Back to User Management</a>

<h1>Edit User</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.users.update', $user->id) }}'>
    @csrf
    @method('PUT')
    <input type='text' name='first_name' value='{{ $user->first_name }}'/>
    <input type='text' name='last_name' value='{{ $user->last_name }}'/>
    <input type='email' name='email' value='{{ $user->email }}'/>
    <input type='password' name='password' placeholder='Password'/>
    <input type='text' name='instagram_account' value='{{ $user->instagram_account }}'/>
    <input type='text' name='address' value='{{ $user->address }}'/>
    <select name='role'>
        <option value='user' {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
        <option value='guest' {{ $user->role === 'guest' ? 'selected' : '' }}>Guest</option>
        <option value='admin' {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
    <button type='submit'>Update User</button>
</form>
@endsection

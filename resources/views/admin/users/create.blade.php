@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<a href='{{ route('admin.users.index') }}'>Back to User Management</a>

<h1>Create User</h1>

<form class='d-flex flex-column' method='POST' action='{{ route('admin.users.store') }}'>
    @csrf
    <input type='text' name='first_name' placeholder='First Name'/>
    <input type='text' name='last_name' placeholder='Last Name'/>
    <input type='email' name='email' placeholder='Email'/>
    <input type='password' name='password' placeholder='Password'/>
    <input type='password' name='password_confirmation' placeholder='Confirm Password'/>
    <input type='text' name='instagram_account' placeholder='Instagram Account'/>
    <input type='text' name='address' placeholder='Address'/>
    <select name='role'>
        <option value='user'>User</option>
        <option value='guest'>Guest</option>
        <option value='admin'>Admin</option>
    </select>
    <button type='submit'>Create User</button>
</form>
@endsection

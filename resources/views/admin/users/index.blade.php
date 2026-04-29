@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<h1>User Management</h1>

<a href="{{ route('admin.users.create') }}">Add User</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Instagram</th>
    <th>Address</th>
    <th>Role</th>
    <th>Email Verified At</th>
    <th>Actions</th>
  </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->instagram_account }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ ucfirst($user->role) }}</td>
        <td>{{ $user->email_verified_at }}</td>
        <td>
            <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection

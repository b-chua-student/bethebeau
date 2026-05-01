@extends('layouts.app')
@section('title', 'My Profile')
@section('content')

<h1>My Profile</h1>

<p>Name: {{ $user->first_name }} {{ $user->last_name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Instagram: {{ $user->instagram_account ?? 'N/A' }}</p>
<p>Address: {{ $user->address ?? 'N/A' }}</p>

<a href='{{ route('app.profile.orders' )}}'>My Orders</a>

<a href="{{ route('app.profile.edit') }}">Edit Profile</a>

<form method='POST' action='{{ route('auth.logout') }}'>
    @csrf
    <button type='submit'>Logout</button>
</form>

<form method='POST' action='{{ route('app.profile.delete') }}'>
    @csrf
    @method('DELETE')
    <button type='submit'>Delete Account</button>
</form>

@endsection

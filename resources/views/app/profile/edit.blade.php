@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
<h1>Edit Profile</h1>

<form method='POST' action='{{ route('app.profile.update') }}'>
    @csrf
    @method('PUT')
    <input type='text' name='first_name' value='{{ $user->first_name }}'/>
    <input type='text' name='last_name' value='{{ $user->last_name }}'/>
    <input type='email' name='email' value='{{ $user->email }}'/>
    <input type='text' name='instagram_account' value='{{ $user->instagram_account }}'/>
    <input type='text' name='address' value='{{ $user->address }}'/>
    <button type='submit'>Update Profile</button>
</form>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
@endsection

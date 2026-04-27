@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<form class='d-flex flex-column align-items-center justify-content-center' method='POST' action='{{ route("auth.login") }}'>
    <input class='border-1' name='email' type='email' placeholder='Email'/>
    <input class='border-1' name='password' type='password' placeholder='Password'/>
    <button type='submit'>Log In</button>
</form>

<div class='d-flex flex-column w-100 align-items-center justify-content-center'>
    <a href='{{ route('auth.register') }}'>Signup</a>
    <a href='{{ route('auth.guest') }}'>Login as guest</a>
</div>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection

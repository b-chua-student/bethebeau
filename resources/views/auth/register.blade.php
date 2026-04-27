@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<form class='d-flex flex-column align-items-center justify-content-center' method='POST' action='{{ route("auth.register") }}'>
    <input class='border-1' name='first_name' type='text' placeholder='First Name'/>
    <input class='border-1' name='last_name' type='text' placeholder='Last Name'/>
    <input class='border-1' name='email' type='email' placeholder='Email'/>
    <input class='border-1' name='password' type='password' placeholder='Password'/>
    <input class='border-1' name='password_confirmation' type='password' placeholder='Confirm Password'/>
    <button type='submit'>Sign Up</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class='d-flex w-100 align-items-center justify-content-center'>
    <a href='{{ route('auth.login') }}'>Login</a>
</div>
@endsection



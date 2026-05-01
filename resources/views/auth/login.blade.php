@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<div class='flex flex-col items-center justify-center w-screen h-screen bg-(--brand-color)'>
    <div class='flex items-center justify-center'>
        <p class='text-white text-8xl font-seasons-italic'>bethebeau</p>
    </div>
    <div class='flex items-center justify-center'>
        <x-login-form />
    </div>
</div>

@endsection

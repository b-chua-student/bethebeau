@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<form method='POST' action='{{ route('auth.logout') }}'>
    <button>Logout</button>
</form>

@endsection


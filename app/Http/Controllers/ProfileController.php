<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('app.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('app.profile.edit', compact('user'));
    }
}

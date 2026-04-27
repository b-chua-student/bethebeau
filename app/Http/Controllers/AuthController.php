<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (!Auth::attempt($validated)) {
            return back()->withErrors(['invalid' => 'Invalid credentials.']);
        }

        $route = Auth::user()->role === 'admin' ? 'admin.dashboard' : 'app.homepage';
        return redirect()->route($route);
    }
}

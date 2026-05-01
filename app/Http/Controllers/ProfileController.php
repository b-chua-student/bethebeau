<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UpdateProfileRequest;

use App\Models\Order;

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

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $validated = $request->validated();

        $user->update($validated);
        return redirect()->route('app.profile.index')->with('success', 'Profile updated.');
    }

    public function destroy()
    {
        $user = Auth::user();

        $user->delete();

        return redirect()->route('auth.login')->with('success', 'Account deleted.');
    }

    public function showOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->whereHas('user')
            ->latest('ordered_at')
            ->get();
        return view('app.profile.orders', compact('user', 'orders'));
    }
}

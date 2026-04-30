<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $items = $cart ? $cart->items()->with('product')->get() : collect();

        $subtotal = $items->sum(fn($item) => $item->product->price * $item->quantity);
        $shipping = 99.99;
        $tax = $subtotal * 0.12;
        $total = $subtotal + $shipping + $tax;

        return view('app.checkout', compact('items', 'subtotal', 'shipping', 'tax', 'total', 'user'));
    }

}

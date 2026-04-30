<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        $items = $cart ? $cart->items()->with('product')->get() : collect();

        return view('app.shopping-cart', compact('items'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        // Get or create cart for the authenticated user
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);

        // Check if product already in cart
        $item = $cart->items()->where('product_id', $request->product_id)->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            $cart->items()->create([
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity,
            ]);
        }

        return redirect()->route('app.shopping-cart')->with('success', 'Added to cart!');
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return redirect()->route('app.shopping-cart')->with('success', 'Item removed.');
    }
}


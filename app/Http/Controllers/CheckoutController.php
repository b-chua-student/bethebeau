<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('app.shopping-cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
        $shipping = 99.99;
        $tax = $subtotal * 0.12;
        $total = $subtotal + $shipping + $tax;

        $order = null;

        DB::transaction(function () use ($user, $cart, $total, &$order) {
            $order = Order::create([
                'user_id'     => $user->id,
                'email'       => $user->email,
                'shipped_to'  => $user->address,
                'status'      => 'pending',
                'total_price' => $total,
            ]);

            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'unit_price' => $item->product->price,
                ]);
            }

            $cart->items()->delete();
        });

        return redirect()->route('app.homepage', $order->id)->with('success', 'Order placed successfully!');
    }
}

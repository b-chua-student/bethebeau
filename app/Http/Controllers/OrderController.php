<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items.product')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users    = User::all();
        $products = Product::all();
        return view('admin.orders.create', compact('users', 'products'));
    }

    public function store(OrderRequest $request)
    {
        $validated = $request->validated();
        $validated['email'] = User::find($validated['user_id'])->email;
        Order::create($validated);
        return redirect()->route('admin.orders.index')->with('success', 'Order created.');
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        $products = Product::all();
        return view('admin.orders.edit', compact('order', 'users', 'products'));
    }

    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                OrderItem::updateOrCreate(
                    ['id' => $item['id'] ?? null],
                    [
                        'order_id'   => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity'   => $item['quantity'],
                        'unit_price' => $item['unit_price'],
                    ]
                );
            }
        }

        $order->update($request->validated());
        return redirect()->route('admin.orders.index')->with('success', 'Order updated.');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted.');
    }
}

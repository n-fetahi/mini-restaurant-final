<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product')->latest()->get();

        return view('user.orders.index', compact('orders'));
    }


    public function show(Order $order)
    {

        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load('items.product');
        return view('user.orders.show', compact('order'));
    }

    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to place an order');
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }

        $products = Product::whereIn('id', array_keys($cart))->get();

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id];
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_amount' => $total,
            'status' => 'pending',
            'shipping_address' => Auth::user()->address ?? 'Not specified'
        ]);

        foreach ($products as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $cart[$product->id],
                'unit_price' => $product->price,
                'subtotal' => $product->price * $cart[$product->id]
            ]);
        }

        session()->forget('cart');

        return redirect()->route('user.orders.index', $order)
            ->with('success', 'Order placed successfully!');
    }


    public function cancel(Order $order)
    {

        if ($order->user_id !== Auth::id() || $order->status !== 'pending') {
            abort(403, 'Unauthorized action or order cannot be cancelled.');
        }

        $order->update(['status' => 'cancelled']);
        return redirect()->route('user.orders.index')
            ->with('success', 'Order has been cancelled successfully.');
    }
}

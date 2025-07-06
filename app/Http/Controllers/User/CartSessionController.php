<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartSessionController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();
        $total = 0;

        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id];
        }

        return view('user.cart', compact('cart', 'products', 'total'));
    }

    public function store(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
        } else {
            $cart[$product->id] = 1;
        }

        session()->put('cart', $cart);
        return redirect()->back();

        session()->save();

        // return response()->json([
        //     'success' => true,
        // ]);
    }

    public function destroy(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            return redirect()->route('user.cart.index')->with('success', 'Product removed from cart');
        }

        return redirect()->route('user.cart.index')->with('error', 'Product not found in cart');
    }
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    use ApiResponses;


    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product')->get() ;
        // $o= $orders->map(function ($order) {
        //      return [
        //         'id' => $order->id,
        //         'total' => $order->total_amount,
        //         'currency'     => 'RY',
        //         'quantity' =>$order->items->sum('quantity'),
        //         'status'       => $order->status,
        //         'created_at'   => $order->created_at,
        //         'updated_at'   => $order->updated_at,
        //         'OrderItems' =>
        //              $order->items->map(function ($item){
        //                 return [
        //                     'id' => $item->id,
        //                     'quantity' => $item->quantity,
        //                     'unit_price'=> $item->unit_price,
        //                     'subtotal' => $item-> subtotal,
        //                     'product' =>[
        //                         'name' => $item->product->name,
        //                         'price' => $item->product->price,
        //                         'description' => $item->product->description,
        //                         'image'=>asset($item->product->description)
        //                     ]
        //                 ];
        //             })

        //     ];
        //  });

        return OrderResource::collection($orders);
    }


    public function show(Order $order)
    {
        $order->load('items.product');

        return new OrderResource($order);

    }


    public function store(Request $request)
    {
    //     $request->validate([
    //     'cart' => 'required|array',
    //     'cart.*' => 'required|integer|min:1'
    // ]);

    $cart = $request->input('cart', []);

    if (!is_array($cart) || empty($cart)) {
        return $this->unprocessableContent("Cart must be a non-empty object");
    }

    foreach ($cart as $productId => $quantity) {
        if (!ctype_digit((string)$productId)) {
            return $this->unprocessableContent("Invalid product ID: $productId");
        }
        if (!is_int($quantity) || $quantity < 1) {
            return $this->unprocessableContent("Invalid quantity for product ID: $productId");
        }
    }

    $cart = $request->input('cart');

    $productIds = array_keys($cart);

    $products = Product::whereIn('id', $productIds)->get();

    if (count($products) !== count($cart)) {
        $foundIds = $products->pluck('id')->toArray();
        $missing = array_diff($productIds, $foundIds);

        return $this->notFound('Some products not found',[
            'missing_ids' => array_values($missing)
        ]);
    }



    $total = 0;

    foreach ($products as $product) {
        $total += $product->price * $cart[$product->id];
    }

    $order = Order::create([
        'user_id' => Auth::id(),
        'total_amount' => $total,
        'status' => 'pending',
        'shipping_address' => Auth::user()->address ?? 'Not specified',
    ]);

    foreach ($products as $product) {

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $cart[$product->id],
            'unit_price' => $product->price,
            'subtotal' => $product->price * $cart[$product->id],
        ]);
    }

        $order->load('items.product');
        return $this->created('Ordered placed successful',
        
             new OrderResource($order)

    );

    }

        public function cancel(Order $order)
    {

        if ($order->status !== 'pending') {
           return $this->forbidden('Unauthorized action, the order cannot be cancelled.');
        }

        $order->update(['status' => 'cancelled']);
        return $this->ok('Order cancelled successfully.');
    }

}

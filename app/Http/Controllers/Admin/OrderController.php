<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
        // عرض جميع الطلبات للإدمن
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // عرض تفاصيل طلب معين للإدمن
    public function show(Order $order)
    {
        $order->load(['user', 'items.product']);
        return view('admin.orders.show', compact('order'));
    }

    // تحديث حالة الطلب
    public function updateStatus(Request $request, Order $order)
    {
        $validStatuses = ['pending', 'processing', 'delivering', 'delivered', 'cancelled'];

        $request->validate([
            'status' => 'required|in:' . implode(',', $validStatuses)
        ]);

        $order->update(['status' => $request->status]);

        return redirect('/admin/orders')->with('success', 'Order status updated successfully');
    }
}

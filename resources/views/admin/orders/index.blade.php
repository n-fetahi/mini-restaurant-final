<x-admin.layout>
    <x-slot name="title">Orders</x-slot>
    <x-admin.page-title>Orders Page</x-admin.page-title>

<div class="container my-5">

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                    <td>{{ $order->items->sum('quantity') }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <span class="badge
                            @if($order->status == 'pending') text-warning
                            @elseif($order->status == 'processing') text-info
                            @elseif($order->status == 'delivering') text-primary
                            @elseif($order->status == 'delivered') text-success
                            @else text-danger @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</x-admin.layout>

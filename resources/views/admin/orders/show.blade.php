<x-admin.layout>
    <x-slot name="title">Orders Details</x-slot>
    <x-admin.page-title>Orders Details Page</x-admin.page-title>

<div class="container  my-5">
    <div class="card">
        <div class="card-header">
            <h3>Order #{{ $order->id }}</h3>
            <span class="badge
                @if($order->status == 'pending') text-warning
                @elseif($order->status == 'processing') text-info
                @elseif($order->status == 'delivering') text-primary
                @elseif($order->status == 'delivered') text-success
                @else text-danger @endif">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Customer Information</h5>
                    <p><strong>Name:</strong> {{ $order->user->name }}</p>
                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Shipping Address</h5>
                    <p>{{ $order->shipping_address }}</p>
                </div>
            </div>

            <h5>Order Items</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->unit_price, 2) }}</td>
                        <td>${{ number_format($item->subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Total:</th>
                        <th>${{ number_format($order->total_amount, 2) }}</th>
                    </tr>
                </tfoot>
            </table>

            <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="status">Update Order Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Delivering</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning mt-3">Update Status</button>
            </form>
        </div>
    </div>
</div>

</x-admin.layout>

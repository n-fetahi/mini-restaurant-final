<x-user.layout>

     <x-user.header-title>Order Details</x-user.header-title>

     <div class="container my-5">
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
                    <h5>Order Information</h5>
                    <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
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

            @if($order->status == 'pending')
                <form action="{{ route('user.orders.cancel', $order) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                </form>
            @endif
        </div>
    </div>
</div>

</x-user.layout>

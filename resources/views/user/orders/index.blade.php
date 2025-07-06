<x-user.layout>

     <x-user.header-title>Your Orders</x-user.header-title>

<div class="container my-5">

    @if($orders->isEmpty())
        <div class="alert alert-info">You have no orders yet.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Order ID</th>
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
                            <a href="{{ route('user.orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                            @if($order->status == 'pending')
                                <form action="{{ route('user.orders.cancel', $order) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

</x-user.layout>

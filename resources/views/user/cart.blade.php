<x-user.layout>
    <x-user.header-title>Your Cart</x-user.header-title>

    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(count($products) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $cart[$product->id] }}</td>
                            <td>${{ number_format($product->price * $cart[$product->id], 2) }}</td>
                            <td>
                                <form action="{{ route('user.cart.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                        <td colspan="2">${{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">
                Your cart is empty
            </div>
        @endif
    </div>

            @if (session('cart'))
            <div class="text-center mt-4">
            <form action="{{ route('user.orders.create') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-dark">
                    <i class="fas fa-shopping-bag"></i> Order Now
                </button>
            </form>
        </div>
            @endif

</x-user.layout>

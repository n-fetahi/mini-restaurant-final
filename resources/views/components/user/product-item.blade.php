@props(['name','price', 'image', 'category', 'id'])

            <div class="col-lg-4 col-md-6">
                <div class="card product-card">
                    <img src="{{ asset($image) }}" class="card-img-top product-img" alt="منتج 1">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-bold h5"> {{ $name }}</h5>
                            <p class="card-title text-secondary"> {{$price}} RY</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-end">
                            <span class="badge text-bg-warning">{{$category}}</span>
                            <div class="d-flex">
                                <form action="{{ route('user.cart.store', $id) }}" method="POST">
                                    @csrf

                                    <button type="submit" onclick="addToCart({{ $id }})" class="cart-btn">
                                        <i class="fas fa-shopping-cart mx-2 {{ isset(session('cart')[$id]) ? 'text-success' : 'text-secondary' }}" id="cart-icon-{{ $id }}"></i>
                                    </button>

                                </form>
                                    {{-- <button type="button" onclick="addToCart({{ $id }})" class="cart-btn">
                                        <i class="fas fa-shopping-cart mx-2 {{ isset(session('cart')[$id]) ? 'text-success' : 'text-secondary' }}" id="cart-icon-{{ $id }}"></i>
                                    </button> --}}
                                <a href="">
                                 <i class="fa-regular fa-heart text-secondary"></i>
                                </a>
                            </div>

                        </div>

                        <a href="{{ route('products.show', ['product'=> $id ]) }}" class="btn btn-sm btn-warning px-5 w-100 mt-3">View</a>

                    </div>
                </div>
            </div>


<script>
    // toastr.options.preventDuplicates = true;

function addToCart(productId) {
    const icon = document.getElementById(`cart-icon-${productId}`);

    fetch(`/cart/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            icon.classList.remove('text-secondary');
            icon.classList.add('text-success');
            toastr.success("Added {{ $name }} to cart successfully","Success");

        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>



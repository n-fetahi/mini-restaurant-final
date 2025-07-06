

<x-user.layout>

     <x-user.header-title>{{ $product->name }} Details</x-user.header-title>


   <div class="d-flex justify-content-center m-4">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset("$product->image") }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-bold text-warning">{{ $product->name }}</h5>
                <p class="card-text text-secondary">{{ $product->price }} RY</p>
                <p class="card-text">{{ $product->description }}</p>
                <div class="text-center">
                     <a href="" class="">
                        <i class="fas fa-shopping-cart mx-2 text-secondary"></i>
                    </a>
                    <a href="">
                        <i class="fa-regular fa-heart text-secondary"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-user.layout>


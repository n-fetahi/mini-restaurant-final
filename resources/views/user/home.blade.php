<x-user.layout>

     <x-user.header-title>Home</x-user.header-title>


    <div class="container py-5">
        <h2 class="text-center mb-5 fw-bold h2 text-secondary section-title">Categories</h2>

        <div class="row">

        <x-user.category-item
        name="Drinks"
        image="{{Vite::asset('resources/images/seciton-title.jpg')}}" />


         </div>
    </div>


    <div class="container py-5">
        <h2 class="text-center my-5 fw-bold h2 text-secondary section-title">Last Products</h2>

        <div class="row">
            
            @foreach ($latestProducts as $product)
            <x-user.product-item
            name="{{ $product->name }}"
            price="{{ $product->price }}"
            image="{{ $product->image }}"
            category="Drinks"
            id="{{ $product->id }}"
            />
            @endforeach

        </div>
    </div>

</x-user.layout>

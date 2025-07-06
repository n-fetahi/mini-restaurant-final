<x-user.layout>

    <x-user.header-title>Products</x-user.header-title>


    <div class="container py-5">

        <div class="row">
            @foreach ($products as $product)
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

    {{ $products->links() }}

</x-user.layout>

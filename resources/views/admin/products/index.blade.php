<x-admin.layout>
    <x-slot name="title">Products</x-slot>
    <x-admin.page-title>Products Page</x-admin.page-title>

    <a href="products/create" class="btn btn-dark m-2">Create a product</a>

    <div class="container row g-3 mt-2 mb-4">

        @foreach ($products as $product)
        <div class="col-4">

            <x-admin.product-item name="{{ $product->name }}"
                                            price="{{ $product->price }}"
                                            image="{{ $product->image }}"
                                            id="{{ $product->id }}"/>

        </div>

        @endforeach

    </div>

        {{ $products->links() }}

</x-admin.layout>

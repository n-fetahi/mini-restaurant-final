<x-admin.layout>
    <x-slot name="title">Show product details</x-slot>
    <x-admin.page-title>Show product details</x-admin.page-title>


    <div class="d-flex justify-content-center m-4">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset("/storage/$product->image") }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-bold text-warning">{{ $product->name }}</h5>
                <p class="card-text text-secondary">{{ $product->price }} RY</p>
                <p class="card-text">{{ $product->description }}</p>
                <div class="text-end">
                    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                </div>

            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title fs-10 text-light" id="exampleModalLabel">Confirmation Delete Product</h1>
      </div>
      <div class="modal-body">
        Are you sure to delete <span class="text-danger">{{ $product->name }}</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Back</button>
        <form action="/admin/products/{{$product->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger  btn-sm">Yes, delete</button>
        </form>

      </div>
    </div>
  </div>
</div>

</x-admin.layout>

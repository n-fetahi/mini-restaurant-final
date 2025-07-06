@props(['name' , 'price' , 'id' , 'image'])

    <a href="/admin/products/{{$id}}" class="card p-0 mb-3">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="{{ asset($image) }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $name }}</h5>
                <p class="card-text"><small class="text-body-secondary">{{ $price }} RY</small></p>
            </div>
            </div>
        </div>
    </a>

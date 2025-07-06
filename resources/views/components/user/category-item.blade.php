 @props(['name','image'])
    <a href="">
        <div class="col-md-4 col-sm-6">
        <div class="card category-card text-center">
            <img src="{{ $image }}" class="card-img-top category-img" alt="صنف 1">
            <div class="card-body">
                <h5 class="card-title h5">{{ $name }}</h5>
            </div>
        </div>        
    </div>
    </a>
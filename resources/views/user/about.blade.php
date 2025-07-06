<x-user.layout>

        <x-user.header-title>About Us</x-user.header-title>

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title h4 text-center">Our Story</h2>
                    <p class="lead">Founded in 2010, Savory Bites began as a small family-owned bistro with just 10 tables.</p>
                    <p>What started as a humble neighborhood eatery has blossomed into one of the city's most celebrated dining destinations. Our founder, Chef Michael Rossi, envisioned a place where quality ingredients and traditional recipes would create unforgettable dining experiences.</p>
                    <p>Today, we continue this legacy by combining time-honored techniques with innovative culinary approaches, all served in our warm, inviting atmosphere.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{Vite::asset('resources/images/seciton-title.jpg')}}" alt="Restaurant interior" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center h4">Our Philosophy</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3>Farm to Table</h3>
                    <p>We source 90% of our ingredients from local farms and producers within a 50-mile radius, ensuring freshness and supporting our community.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Seasonal Menus</h3>
                    <p>Our menu changes with the seasons to showcase ingredients at their peak, offering you the very best flavors nature has to offer.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Made with Love</h3>
                    <p>Every dish is prepared with care and attention to detail, just like you'd make at home - only better!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center h4">What Our Guests Say</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <img src="{{Vite::asset('resources/images/guest.jpg')}}" alt="Customer" class="testimonial-img mb-3">
                            <h5>Emily Johnson</h5>
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"The seasonal tasting menu was extraordinary! Every course was a delightful surprise. Service was impeccable."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <img src="{{Vite::asset('resources/images/guest.jpg')}}" alt="Customer" class="testimonial-img mb-3">
                            <h5>Robert Garcia</h5>
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text">"Best steak I've had in years! The wine pairing recommendation was perfect. We'll definitely be back."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <img src="{{Vite::asset('resources/images/guest.jpg')}}" alt="Customer" class="testimonial-img mb-3">
                            <h5>Michael Rossi</h5>
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="card-text">"Wonderful anniversary dinner! The staff went above and beyond to make our evening special."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



  
</x-user.layout>
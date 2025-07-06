<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    {{-- <link rel="stylesheet" href="{{Vite::asset('resources/css/style.css')}}"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}

    <style>

    </style>
    @vite(['resources/css/app.css'])

</head>
<body>

       <ul class="nav nav-tabs bg-dark text-light px-2 d-flex justify-content-between align-items-center py-4">
            <div class="d-flex">
                <x-admin.nav-link href="{{ route('home') }}" active="{{ request()->routeIs('home') }}">
                    Home
                </x-admin.nav-link>
                <x-admin.nav-link href="{{ route('products.index') }}" active="{{ request()->routeIs('products.*') }}">
                    Products
                </x-admin.nav-link>
                <x-admin.nav-link href="{{ route('about') }}" active="{{ request()->routeIs('about') }}">
                    About
                </x-admin.nav-link>
                @auth
                    <x-admin.nav-link href="{{ route('user.orders.index') }}" active="{{ request()->routeIs('user.orders.*') }}">
                        Orders
                    </x-admin.nav-link>
                @endauth

            </div>

            <div class="d-flex align-items-center" >
                <a href="{{ route('user.cart.index') }}">
                {{-- data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" --}}

                 <i class="fas fa-shopping-cart mx-2 text-warning me-3" style="font-size: 12px"></i> </a>
                <a href="" class="btn text-warning btn-sm text-decoration-underline">Ar</a>
               @auth
              <form action="{{ route('login.destroy') }}" method="POST" class="d-flex align-items-center ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn text-danger btn-sm text-decoration-underline"> Logout </button>
                </form>
               @endauth

               @guest
                    <a href="{{ route('login.create') }}" class="btn text-warning btn-sm text-decoration-underline mx-2">Login</a>
                    <a href="{{ route('register.create') }}" class="btn text-warning btn-sm text-decoration-underline mx-2">Register</a>

               @endguest
            </div>

        </ul>

        {{ $slot }}
<br>

    <footer class="bg-dark pt-5 pb-4 mx-0 px-0 my-0">
    <div class="container-fluid px-0">
        <div class="row mx-0">
            <div class="col-lg-4 col-md-6 mb-4 ps-4">  <!-- Added ps-4 for some left padding -->
                <div class="footer-links">
                    <h5 class="text-warning text-uppercase mb-4">About Our Restaurant</h5>
                    <p class="text-white">We craft exquisite dishes using premium ingredients at exceptional value. Our mission is to deliver unforgettable dining experiences through impeccable service and a warm, inviting atmosphere that makes every guest feel special.</p>
                    <div class="social-icons mt-4">
                        <a href="#" class=" me-2"><i class="fab fa-facebook-f text-dark"></i></a>
                        <a href="#" class=" me-2"><i class="fab fa-twitter text-dark"></i></a>
                        <a href="#" class=" me-2"><i class="fab fa-instagram text-dark"></i></a>
                        <a href="#" class=""><i class="fab fa-linkedin-in text-dark"></i></a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4 ps-4">  <!-- Added ps-4 -->
                <div class="footer-links">
                    <h5 class="text-warning text-uppercase mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Products</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Special Offers</a></li>
                        <li class="mb-2"><a href="#" class="text-white">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Policies -->
            <div class="col-lg-2 col-md-6 mb-4 ps-4">  <!-- Added ps-4 -->
                <div class="footer-links">
                    <h5 class="text-warning text-uppercase mb-4">Policies</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">Terms of Service</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Return Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white">Shipping Info</a></li>
                        <li class="mb-2"><a href="#" class="text-white">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 mb-4 ps-4">  <!-- Added ps-4 -->
                <div class="footer-links">
                    <h5 class="text-warning text-uppercase mb-4">Contact Us</h5>
                    <ul class="list-unstyled text-white">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt text-warning me-2"></i>
                            123 Main Street, City, Country
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone text-warning me-2"></i>
                            +1 (234) 567-8901
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope text-warning me-2"></i>
                            info@example.com
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-clock text-warning me-2"></i>
                            Working Hours: 9AM - 8PM
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mx-0">
            <div class="col-12 text-center pt-3 border-top border-secondary">
                <p class="mb-0 text-white">
                    &copy; 2025 All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</footer>



    <div class="offcanvas offcanvas-end w-25 " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header ">
            <h5 class="offcanvas-title text-center h4 text-warning" id="offcanvasRightLabel">Your cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card mb-3" style="max-width: auto">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="https://placehold.co/100x100" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body py-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title p-0 m-0 fw-bold" style="font-size: 13px">Coffee</h5>
                            <a href=""><i class="fa-solid fa-trash text-danger" style="font-size: 13px"></i></a>
                        </div>
                        <p class="card-text"><small class="text-body-secondary m-0 p-0" style="font-size: 12px">200 RY</small></p>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
   @vite(['resources/js/app.js'])
    {{-- <script src="{{ asset("toastr/toastr.min.js") }}"></script> --}}

</body>
</html>

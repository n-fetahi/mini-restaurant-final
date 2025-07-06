<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>{{$title}}</title>
</head>
<body>

    @auth
        <ul class="nav nav-tabs bg-dark text-light px-2 d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <x-admin.nav-link href="{{ route('admin.dashboard') }}" active="{{ request()->routeIs('admin.dashboard') }}">
                    Dashboard
                </x-admin.nav-link>
                <x-admin.nav-link href="{{ route('admin.categories') }}" active="{{ request()->routeIs('admin.categories') }}">
                    Categories
                </x-admin.nav-link>
                <x-admin.nav-link href="{{ route('admin.products.index') }}" active="{{ request()->routeIs('admin.products.*') }}">
                    Products
                </x-admin.nav-link>

                <x-admin.nav-link href="{{ route('admin.orders.index') }}" active="{{ request()->routeIs('admin.orders.*') }}">
                    Orders
                </x-admin.nav-link>
            </div>

                <form action="/admin/logout" method="POST" class="d-flex align-items-center ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm "> Logout </button>
                </form>

        </ul>
    @endauth



    <div class="mb-5">
        {{ $slot }}
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>

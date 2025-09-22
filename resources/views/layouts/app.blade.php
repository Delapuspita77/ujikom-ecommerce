<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My Pharmacy')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
    <nav class="flex items-center justify-between px-6 lg:px-12 py-4">
            <!-- Logo -->
            <div class="flex lg:flex-1">
                <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                    <!-- <span class="sr-only">Ecommerce Healthcare</span> -->
                    <img src="{{ asset('images/logo.png') }}" 
                        alt="Logo" 
                        class="h-16 w-auto max-h-12 object-contain -my-2">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex lg:gap-x-4 items-center">
                <a href="{{ url('/') }}" 
                class="inline-flex items-center rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:text-teal-600 transition">
                Home
                </a>

                @auth
                    <a href="{{ route('products.index') }}" 
                    class="inline-flex items-center rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:text-teal-600 transition">
                    Products
                    </a>
                    <a href="{{ route('cart.index') }}" 
                    class="inline-flex items-center rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:text-teal-600 transition">
                    Cart
                    </a>
                    <a href="{{ route('orders.index') }}" 
                    class="inline-flex items-center rounded-md px-4 py-2 text-sm font-medium text-gray-700 hover:text-teal-600 transition">
                    My Orders
                    </a>
                    <a href="{{ route('profile.show') }}" 
                    class="inline-flex items-center rounded-md bg-teal-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 hover:shadow-md transition">
                    My Account
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                    class="inline-flex items-center rounded-md bg-teal-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 hover:shadow-md transition">
                    Login
                    </a>
                    <a href="{{ route('register') }}" 
                    class="inline-flex items-center rounded-md bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-300 transition">
                    Register
                    </a>
                @endauth
            </div>


            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main class="flex-1 px-6 lg:px-12 py-8 bg-white shadow-sm rounded-lg m-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center py-6 mt-auto border-t border-gray-200">
        <div class="font-bold text-gray-900">My Pharmacy</div>
        <div class="text-sm text-gray-600">Jl. Sehat No. 123, Surabaya</div>
        <div class="text-xs text-gray-500 mt-2">&copy; {{ date('Y') }} Ecommerce Healthcare. All rights reserved.</div>
    </footer>

</body>
</html>

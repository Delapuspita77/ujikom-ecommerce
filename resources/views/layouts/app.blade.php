<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Ecommerce Healthcare')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        /* Minimalis dan modern */
        body, html {
            margin: 0; padding: 0; height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            color: #333;
        }
        header {
            background: #fff;
            box-shadow: 0 2px 4px rgb(0 0 0 / 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header a.logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: #2c3e50;
            text-decoration: none;
        }
        nav a {
            margin-left: 1.5rem;
            color: #555;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #007bff;
        }
        main {
            padding: 2rem;
            min-height: calc(100vh - 120px); /* header + footer */
            background: #fff;
        }
        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.9rem;
            color: #555;
            background: #f1f1f1;
            line-height: 1.6;
        }
        footer .store-name {
            font-weight: 700;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ url('/') }}" class="logo">Ecommerce Healthcare</a>
       <nav>
            <a href="{{ url('/') }}">Home</a>

            @auth
                <a href="{{ route('products.index') }}">Products</a>
                <a href="{{ route('cart.index') }}">Cart</a>
                <a href="{{ route('orders.index') }}">My Orders</a>

                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>

    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="store-name">Ecommerce Healthcare</div>
        <div>Jl. Sehat No. 123, Surabaya</div>
        <div>&copy; {{ date('Y') }} Ecommerce Healthcare. All rights reserved.</div>
    </footer>
</body>
</html>

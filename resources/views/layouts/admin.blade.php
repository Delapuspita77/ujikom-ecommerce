<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    {{-- Tailwind & JS via Vite --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-teal-600 text-white flex flex-col shadow-md">
            <!-- Header Sidebar -->
            <div class="p-6 text-2xl font-bold border-b border-teal-500">
                Admin Panel
            </div>

            <!-- Navigation -->
            <nav class="flex-1 mt-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block py-2.5 px-4 rounded hover:bg-teal-500 transition">
                   📊 Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" 
                   class="block py-2.5 px-4 rounded hover:bg-teal-500 transition">
                   🛒 Products
                </a>
                <a href="{{ route('admin.users.index') }}" 
                   class="block py-2.5 px-4 rounded hover:bg-teal-500 transition">
                   👤 Users
                </a>
                <a href="{{ route('admin.orders.index') }}" 
                   class="block py-2.5 px-4 rounded hover:bg-teal-500 transition">
                   📦 Orders
                </a>
                <a href="{{ route('admin.categories.index') }}" 
                   class="block py-2.5 px-4 rounded hover:bg-teal-500 transition">
                   🗂️ Categories
                </a>
                <a href="{{ route('admin.feedbacks.index') }}" 
                   class="block py-2.5 px-4 rounded hover:bg-teal-500 transition">
                   💬 Feedback
                </a>
            </nav>

            <!-- Logout -->
            <div class="p-4 border-t border-teal-500">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full py-2.5 rounded-md bg-gray-100 text-teal-700 font-semibold hover:bg-gray-200 transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8 bg-gray-50">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">@yield('title')</h1>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

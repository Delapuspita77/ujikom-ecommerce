<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    
    {{-- Panggil Tailwind & JS via Vite --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6 text-2xl font-bold text-blue-600">
                Admin Panel
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" 
                   class="block py-2.5 px-4 hover:bg-gray-200 rounded">Dashboard</a>
                <a href="{{ route('admin.products.index') }}" 
                   class="block py-2.5 px-4 hover:bg-gray-200 rounded">Products</a>
                <a href="{{ route('admin.users.index') }}" 
                   class="block py-2.5 px-4 hover:bg-gray-200 rounded">Users</a>
                <a href="{{ route('admin.orders.index') }}" 
                   class="block py-2.5 px-4 hover:bg-gray-200 rounded">Orders</a>
                <a href="{{ route('admin.categories.index') }}" 
                   class="block py-2.5 px-4 hover:bg-gray-200 rounded">Categories</a>
                <a href="{{ route('admin.feedbacks.index') }}" 
                   class="block py-2.5 px-4 hover:bg-gray-200 rounded">Feedback</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>

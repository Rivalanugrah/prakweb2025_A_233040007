<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Load Tailwind CSS jika sudah setup -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="relative flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-4xl mx-auto text-center p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Welcome to My Website</h1>
            
            <p class="text-gray-600 mb-8 text-lg">
                A simple blog application built with Laravel
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <!-- Tombol Login -->
                <a href="{{ route('login') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Login
                </a>
                
                <!-- Tombol Register -->
                <a href="{{ route('register') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Register
                </a>
                
                <!-- Tombol untuk melihat posts tanpa login -->
                <a href="{{ route('posts.index') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-900 transition duration-200 shadow-md">
                    View Posts
                </a>
            </div>
            
            <!-- Info tambahan -->
            <div class="mt-12 p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Features:</h2>
                <ul class="text-left inline-block text-gray-600">
                    <li class="mb-2">✓ User Authentication (Login/Register)</li>
                    <li class="mb-2">✓ Create, Read, Update, Delete Posts</li>
                    <li class="mb-2">✓ Dashboard for managing posts</li>
                    <li class="mb-2">✓ Search and Pagination</li>
                    <li>✓ Responsive Design</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
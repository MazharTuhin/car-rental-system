<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="container mx-auto p-4">
                @include('partials.flash-messages')
                {{ $slot }}
            </main>

            <!-- Footer Section -->
            <footer class="container mx-auto bg-gray-800 text-white py-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-wrap justify-between">
                        <div class="w-full md:w-1/3 mb-6 md:mb-0">
                            <h3 class="text-xl font-bold mb-4">Car Rental Service</h3>
                            <p class="text-gray-400">Providing quality car rentals since 2010.</p>
                        </div>
                        <div class="w-full md:w-1/3 mb-6 md:mb-0">
                            <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                            <ul class="text-gray-400">
                                <li class="mb-2"><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                                <li class="mb-2"><a href="{{ route('cars.index') }}" class="hover:text-white">Cars</a></li>
                                <li class="mb-2"><a href="{{ route('about') }}" class="hover:text-white">About Us</a></li>
                                <li class="mb-2"><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/3">
                            <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-white">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-white">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 border-t border-gray-700 pt-8 text-center text-gray-400">
                        <p>&copy; {{ date('Y') }} Car Rental Service. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

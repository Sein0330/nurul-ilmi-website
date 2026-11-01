<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Nurul Ilmi') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen">
            <!-- NAVBAR HORIZONTAL -->
            <nav class="bg-white/90 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-20 items-center">
                        <div class="flex items-center">
                            <a href="/" class="flex items-center gap-2">
                                <img src="{{ asset('logo.png') }}" alt="Nurul Ilmi" class="h-12 w-auto object-contain">
                            </a>
                        </div>
                        
                        <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-600">
                            <a href="#dashboard" class="hover:text-[#b08d6a] transition">Home</a>
                            <a href="#program" class="hover:text-[#b08d6a] transition">Program</a>
                            <a href="#mentor" class="hover:text-[#b08d6a] transition">Instruktur</a>
                            <a href="#registration" class="hover:text-[#b08d6a] transition">Pendaftaran</a>
                        </div>

                        <div class="flex items-center space-x-3">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/admin/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-[#b08d6a]">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm font-semibold text-[#b08d6a] hover:text-[#9c7a59] px-4 py-2 rounded-lg border border-[#b08d6a]/20 hover:bg-[#f4ece4] transition">Sign In</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] px-5 py-2.5 rounded-lg shadow-sm transition">Sign Up</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- PAGE CONTENT -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

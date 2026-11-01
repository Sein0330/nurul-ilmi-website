<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Nurul Ilmi') }} - Admin Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="h-full font-sans antialiased text-gray-800" x-data="{ sidebarOpen: false }">
        <div class="min-h-full flex">
            <!-- Sidebar Desktop -->
            <aside class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 bg-white border-r border-gray-200 z-30">
                <!-- Sidebar Header with Logo -->
                <div class="h-20 flex items-center px-6 border-b border-gray-100">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="Nurul Ilmi" class="h-12 w-auto object-contain">
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                    <div class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        Menu Utama
                    </div>

                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-[#b08d6a]/10 text-[#9c7a59]' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                        <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-[#9c7a59]' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <span>Data Pendaftar</span>
                    </a>

                    <a href="{{ route('dashboard') }}"
                       target="_blank"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span>Lihat Portal Siswa</span>
                    </a>

                    <div class="pt-4 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        Manajemen
                    </div>

                    <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Program Belajar</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Pengguna & Staff</span>
                    </a>
                </nav>

                <!-- Sidebar Footer User Profile -->
                <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <div class="w-9 h-9 rounded-full bg-[#b08d6a] text-white flex items-center justify-center font-bold text-sm shrink-0">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <div class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <div class="text-xs text-[#9c7a59] font-semibold uppercase tracking-wider">
                                {{ Auth::user()->roles->first()->name ?? 'Super Admin' }}
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="lg:pl-64 flex flex-col flex-1 min-w-0">
                <!-- Top Navbar for Admin -->
                <header class="h-20 bg-white border-b border-gray-200 sticky top-0 z-20 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <!-- Mobile Hamburger Button -->
                        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 class="text-lg sm:text-xl font-bold text-gray-900">
                            Panel Administrasi Nurul Ilmi
                        </h1>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex items-center gap-2 text-xs text-gray-500 bg-gray-50 px-3 py-1.5 rounded-full border border-gray-200">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>Sistem Aktif (SQLite)</span>
                        </div>

                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-xs sm:text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] rounded-xl shadow-xs transition-all duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </header>

                <!-- Mobile Sidebar Overlay -->
                <div x-show="sidebarOpen" x-cloak class="fixed inset-0 z-40 lg:hidden flex">
                    <div @click="sidebarOpen = false" class="fixed inset-0 bg-gray-600/50 backdrop-blur-xs"></div>
                    <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white z-50">
                        <div class="h-20 flex items-center justify-between px-6 border-b border-gray-100">
                            <img src="{{ asset('logo.png') }}" alt="Nurul Ilmi" class="h-10 w-auto object-contain">
                            <button @click="sidebarOpen = false" class="p-2 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold bg-[#b08d6a]/10 text-[#9c7a59]">
                                <span>Data Pendaftar</span>
                            </a>
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-gray-600">
                                <span>Lihat Portal Siswa</span>
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Page Content -->
                <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                    {{ $slot ?? '' }}
                    @yield('content')
                </main>
            </div>
        </div>

        @livewireScripts
    </body>
</html>


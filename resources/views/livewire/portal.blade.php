<div class="min-h-screen bg-gray-50 flex flex-col">
    <!-- NAVBAR HORIZONTAL -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex items-center cursor-pointer" wire:click="navigateTo('home')">
                    <img src="{{ asset('logo.png') }}" alt="Nurul Ilmi" class="h-12 w-auto object-contain">
                </div>
                
                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-4 text-sm font-medium text-gray-600 bg-gray-50/50 p-1 rounded-xl">
                    <button wire:click="navigateTo('home')" class="px-4 py-2 rounded-lg transition {{ $currentPage === 'home' ? 'bg-white text-[#b08d6a] shadow-sm' : 'hover:text-[#b08d6a]' }}">Home</button>
                    <button wire:click="navigateTo('program')" class="px-4 py-2 rounded-lg transition {{ $currentPage === 'program' ? 'bg-white text-[#b08d6a] shadow-sm' : 'hover:text-[#b08d6a]' }}">Program</button>
                    <button wire:click="navigateTo('instruktur')" class="px-4 py-2 rounded-lg transition {{ $currentPage === 'instruktur' ? 'bg-white text-[#b08d6a] shadow-sm' : 'hover:text-[#b08d6a]' }}">Instruktur</button>
                    <button wire:click="navigateTo('pendaftaran')" class="px-4 py-2 rounded-lg transition {{ $currentPage === 'pendaftaran' ? 'bg-white text-[#b08d6a] shadow-sm' : 'hover:text-[#b08d6a]' }}">Pendaftaran</button>
                </div>

                <!-- Tombol Auth Desktop -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <div class="flex items-center gap-4">
                            <a href="{{ url('/admin/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-[#b08d6a]">Dashboard</a>
                            <div class="h-6 w-px bg-gray-300"></div>
                            <span class="text-sm font-bold text-gray-800">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-4 py-2 rounded-lg transition">Sign Out</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-[#b08d6a] hover:text-[#9c7a59] px-4 py-2 rounded-lg border border-[#b08d6a]/20 hover:bg-[#f4ece4] transition">Sign In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] px-5 py-2.5 rounded-lg shadow-sm transition">Sign Up</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA (Animasi transisi pindah halaman) -->
    <main class="flex-grow py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        <div class="transition-all duration-300" wire:transition>
            @if($currentPage === 'home')
                @include('pages.home')
            @elseif($currentPage === 'program')
                @include('pages.program')
            @elseif($currentPage === 'instruktur')
                @include('pages.instruktur')
            @elseif($currentPage === 'pendaftaran')
                @include('pages.pendaftaran')
            @endif
        </div>
    </main>

    <!-- FOOTER & KONTAK KAMI -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="text-center md:text-left">
                    <p class="font-bold text-xl text-gray-800">Nurul Ilmi</p>
                    <p class="text-sm text-gray-500 mt-1">Membentuk Generasi Berilmu, Beriman, dan Berakhlak Mulia.</p>
                </div>
                <div class="text-center md:text-right text-sm text-gray-600">
                    <p class="font-medium text-gray-800 mb-2">Kontak Kami</p>
                    <p>Jl. Cikoneng, Bojongsoang, Bandung, RT 05/RW 05</p>
                    <div class="flex justify-center md:justify-end gap-4 mt-2">
                        <a href="https://wa.me/62895365210883" target="_blank" class="text-[#b08d6a] font-semibold hover:underline">WA Septi</a>
                        <a href="https://wa.me/6281563955689" target="_blank" class="text-[#b08d6a] font-semibold hover:underline">WA Denaya</a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-100 pt-6 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} Nurul Ilmi. All rights reserved.
            </div>
        </div>
    </footer>

    @livewireScripts
</div>

<x-guest-layout>
    <!-- Logo & Subtext Header -->
    <div class="text-center text-gray-600 text-sm mb-6">
        <img src="{{ asset('logo.png') }}" alt="Nurul Ilmi" class="h-16 mx-auto mb-4 object-contain">
        <p class="font-bold text-gray-900 text-base">Mari bergabung dengan Grup Nurul Ilmi</p>
        <p class="text-xs text-gray-500 mt-1 italic">-solusi pembelajaran yang seimbang antara iman, ilmu, dan akhlak-</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full rounded-xl"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#b08d6a] shadow-xs focus:ring-[#b08d6a]" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between pt-2">
            @if (Route::has('password.request'))
                <a class="underline text-xs text-gray-500 hover:text-gray-900 focus:outline-none" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="px-6 py-2.5 text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] rounded-full shadow-xs transition-all duration-200">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="pt-4 border-t border-gray-100 text-center text-xs text-gray-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-[#b08d6a] hover:text-[#9c7a59] underline">
                Daftar sekarang
            </a>
        </div>
    </form>
</x-guest-layout>

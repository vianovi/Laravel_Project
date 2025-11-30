<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Header -->
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-bold text-gray-900">
            Penerimaan Santri Baru
        </h1>
        <p class="mt-1 text-sm text-gray-600">
            Silakan masuk menggunakan akun Google yang sudah terdaftar.
        </p>
    </div>

    <!-- Login dengan Google -->
    <div class="mb-6">
        <a href="{{ route('google.redirect') }}"
           class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md
                  bg-white text-sm font-medium text-gray-700 shadow-sm
                  hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{-- Logo Google sederhana (bulatan) --}}
            <span class="mr-2 inline-flex items-center justify-center w-5 h-5 rounded-full bg-white border border-gray-300">
                G
            </span>
            <span>Masuk dengan Akun Google</span>
        </a>
    </div>

    <div class="flex items-center my-4">
        <div class="flex-grow border-t border-gray-200"></div>
        <span class="mx-2 text-xs text-gray-400 uppercase">atau</span>
        <div class="flex-grow border-t border-gray-200"></div>
    </div>

    <!-- Login Administrator (email & password) -->
    <div class="mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase">
            Login Administrator
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a
                    class="underline text-xs text-gray-600 hover:text-gray-900 rounded-md
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

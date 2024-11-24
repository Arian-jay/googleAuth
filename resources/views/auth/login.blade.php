<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Google Login Button -->
    <div class="flex justify-center mt-6">
        <a href="{{ route('google.redirect') }}" class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-semibold text-xs uppercase tracking-widest rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 48 48">
                <path d="M24 9.5c3.1 0 5.8 1.1 8 2.8L37 7.3C33.5 4.7 29.1 3 24 3 14.9 3 7.2 9 4.3 17.4l8.2 6.3C14.2 17.3 18.7 14 24 14c2.5 0 4.8.7 6.8 1.9l-2.7 2.6c-1.2-.5-2.4-.8-3.6-.8-4.1 0-7.4 2.6-8.6 6.2h16.9c-.7 5.8-5.4 10-10.3 10-3.5 0-6.5-2.3-7.8-5.4l-8.4 6.5C8 41.1 15.5 45 24 45c6.5 0 12.3-2.2 16.3-6.1 3.9-3.8 6-9 6-14.5 0-1.1-.1-2.3-.3-3.4H24v6.9h10.3c-.4 1.6-1 3.1-2 4.3h-8.3V9.5z"/>
            </svg>
            {{ __('Login with Google') }}
        </a>
    </div>
</x-guest-layout>

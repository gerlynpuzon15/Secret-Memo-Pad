<!-- resources/views/auth/login.blade.php -->

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="img/logo.jpg" alt="" width="150dp">
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <x-label for="remember_me" class="ml-2">{{ __('Remember me') }}</x-label>
                </div>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="text-center"> <!-- Centering the login button -->
                <x-button>{{ __('Log in') }}</x-button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">Don't have an account? Register here</a>
        </div>
    </x-authentication-card>
</x-guest-layout>

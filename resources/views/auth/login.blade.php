<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col items-center mb-4"> <!-- Centering the heading and paragraph -->
                <h1 class="text-2xl font-bold mb-2 text-center">Expense Tracker System</h1> <!-- Bold heading -->
                <p class="text-sm text-gray-600 text-center">Provide Necessary Details</p> <!-- Centered paragraph -->
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between mt-4"> <!-- Adjusted flex container for checkbox and link -->
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="flex flex-col items-center justify-end mt-4">
                <div class="mt-2"> 
                    <x-button class="w-32 py-2 text-sm mb-2">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <!-- Create Account Link -->
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4" href="{{ route('register') }}">
                    {{ __('Create Account') }}
                </a>
                <!-- End of Create Account Link -->
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

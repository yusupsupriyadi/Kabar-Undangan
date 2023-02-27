<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" class="text-black" :value="__('Email')" />
                <x-text-input id="email" class="mt-2 block w-full text-sm" type="email" name="email" placeholder="masukan email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" class="text-black" :value="__('Password')" />

                <x-text-input id="password" class="mt-2 block w-full" type="password" name="password" placeholder="masukan password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="mt-4 block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-900">{{ __('Ingatkan saya') }}</span>
                </label>
            </div>

            <div class="mt-6 flex items-center justify-center">
                {{-- <section class="hidden">
                    @if (Route::has('password.request'))
                        <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </section> --}}

                <x-primary-button class="w-full text-center">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
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
                    <div class="left">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="align-items: right" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ route('auth.linkedln') }}"
                    style="background: rgb(31, 63, 167); padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                    Login with Linkedln
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ route('auth.twitter') }}"
                    style="background: rgb(48, 103, 206); padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                    Login with Twitter
                </a>
            </div>
            {{-- Login with GitHub --}}
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('social/github') }}"
                    style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with GitHub
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('social/facebook') }}"
                    style="margin-top: 0px !important;background: blue; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with Facebook
                </a>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="social/google" title="Connexion/Inscription avec Google">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;height: 40px;border-radius: 12px">
                    {{-- <img src="../btn_google_signin_dark_normal_web.png" style="margin-left: 3em;height: 40px;border-radius: 12px"> --}}
                </a>

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <a class="mt-5">
                {{-- __('auth.register') --}}
                {{ trans('auth.register') }}
            </a>

            <hr class="border my-2">

            <div class="flex justify-contebt text-gray-500">
                <a href="?locale=en" class="hover:text-gray-700 hover:font-bold">EN</a>
                <a href="?locale=fr" class="hover:text-gray-700 hover:font-bold">FR</a>
                <a href="?locale=es" class="hover:text-gray-700 hover:font-bold">ES</a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

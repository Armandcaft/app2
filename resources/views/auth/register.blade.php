<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <nav>
                <a class="underline text-right text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <div class="flex items-center justify-end mt-4">
                <a href="social/google">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;height: 40px;border-radius: 12px">
                    {{-- <img src="../btn_google_signin_dark_normal_web.png" style="margin-left: 3em;height: 40px;border-radius: 12px"> --}}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
                </div>
            </nav>
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ route('auth.linkedln') }}"
                    style="background: rgb(31, 63, 167); padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                    {{ __('Register with Linkedln') }}
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ route('auth.twitter') }}"
                    style="background: rgb(48, 103, 206); padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                    {{ __('Register with Twitter') }}
                </a>
            </div>
            {{-- Login with GitHub --}}
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('social/github') }}"
                    style="background: #313131; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    {{ __('Register with GitHub') }}
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('social/facebook') }}"
                    style="margin-top: 0px !important;background: blue; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    {{ __('Register with Facebook') }}
                </a>
            </div>

            <hr class="border my-2">

            <div class="flex justify-contebt text-gray-500">
                <a href="?locale=en" class="hover:text-gray-700 hover:font-bold">EN</a>
                <a href="?locale=fr" class="hover:text-gray-700 hover:font-bold">FR</a>
                <a href="?locale=es" class="hover:text-gray-700 hover:font-bold">ES</a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

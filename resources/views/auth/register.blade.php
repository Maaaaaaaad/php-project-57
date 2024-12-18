<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        <h2 class="text-center mb-4 text-4xl"><a href="{{ url('/') }}">Менеджер задач</a></h2>
        @csrf

        <!-- Validation Errors -->
        <x-input-error :errors="$errors->get('name')" class="mt-2" />
        <x-input-error :errors="$errors->get('email')" class="mt-2" />
        <x-input-error :errors="$errors->get('password')" class="mt-2" />
        <x-input-error :errors="$errors->get('password_confirmation')" class="mt-2" />

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Имя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Подтверждение')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Уже зарегистрированы?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Зарегистрировать') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

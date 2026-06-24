<x-guest-layout>
    <div class="flex flex-col items-center mb-6">
        <a href=" /">
            <x-application-logo class="w-24 h-24 object-contain" />
        </a>
        <h2 class="mt-4 text-2xl font-black text-gray-950 tracking-tight text-center uppercase">
            Rocket Papas
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Hecho para antojar, protegido para ganar</p>
    </div>

    <!-- Status de Sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Correo Electrónico -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')"
                class="font-bold text-gray-700 dark:text-gray-300" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg shadow-sm"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')"
                class="font-bold text-gray-700 dark:text-gray-300" />
            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-lg shadow-sm"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme (Checkboxes estilizados) -->
        <div class="block">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-yellow-400 dark:bg-gray-900 dark:border-gray-700"
                    name="remember">
                <span
                    class="ms-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ __('Mantener sesión abierta') }}</span>
            </label>
        </div>

        <!-- Botones de Acción -->
        <div class="flex items-center justify-between pt-2">
            @if (Route::has('password.request'))
                <a class="underline text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 bg-red-600 border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-wider hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-md">
                {{ __('Entrar') }}
            </button>
        </div>
    </form>
</x-guest-layout>
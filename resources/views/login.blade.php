 <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
   
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-title p-b-37">
                        Formulaire de connexion
            </span>
            <div>
                <x-jet-label for="email" value="{{ __('Adresse E-mail') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <span class="focus-input100"></span>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <span class="focus-input100"></span>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Mémoriser mes accès') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{route('register')}}">Créer un compte</a>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Connectez-vous maintenant !') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout></div>
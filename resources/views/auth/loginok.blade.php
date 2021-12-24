<!DOCTYPE html>
<html lang="fr">
<head>
	<title>{{config('app.name')}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="{{ URL::to('login_css/images/icons/favicon.ico') }}"/>

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/vendor/bootstrap/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/fonts/iconic/css/material-design-iconic-font.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/vendor/animate/animate.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/vendor/css-hamburgers/hamburgers.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/vendor/animsition/css/animsition.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/vendor/select2/select2.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/vendor/daterangepicker/daterangepicker.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('login_css/css/main.css') }}">

</head>
<body> 
	
	<x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
		<div class="container-login100" style="background-image: url('login_css/images/marguerite.jpg');">
			@if (session('status'))
	            <div class="mb-4 font-medium text-sm text-green-600">
	                {{ session('status') }}
	            </div>
	        @endif

			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
	            @csrf

					<span class="login100-form-title p-b-37">
						Formulaire de connexion
					</span>

					<div class="validate-input m-b-20" data-validate="Enter username or email">
						<input placeholder="Adresse E-mail" type="email" name="email" :value="old('email')" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input type="password" placeholder="Mot de passe" name="password" required autocomplete="current-password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-25" data-validate = "">
					<div class="block mt-4">
		                <label for="remember_me" class="flex items-center">
		                    <x-jet-checkbox id="remember_me" name="remember" />
		                    <span class="ml-2 text-sm text-gray-600">{{ __('Mémoriser mes accès') }}</span>
		                </label>
		            </div>

					<div class="container-login100-form-btn" >
						<button class="login100-form-btn" type="submit">
							{{ __('Connectez-vous maintenant !') }}
						</button>
					</div>

					<div class="text-center">
						<a class="txt2 hov1" href="{{route('register')}}">Créer un compte</a>
		                @if (Route::has('password.request'))
		                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
		                        {{ __('Mot de passe oublié?') }}
		                    </a>
		                @endif
						</a>
					</div>
					
				</form>

				
			</div>
		</div>
	
	
    </x-jet-authentication-card>

	<div id="dropDownSelect1"></div>
	

	<script src="{{ URL::to('login_css/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

	<script src="{{ URL::to('login_css/vendor/animsition/js/animsition.min.js') }}"></script>

	<script src="{{ URL::to('login_css/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ URL::to('login_css/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

	<script src="{{ URL::to('login_css/vendor/select2/select2.min.js') }}"></script>

	<script src="{{ URL::to('login_css/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ URL::to('login_css/vendor/daterangepicker/daterangepicker.js') }}"></script>

	<script src="{{ URL::to('login_css/vendor/countdowntime/countdowntime.js') }}"></script>

	<script src="{{ URL::to('login_css/js/main.js') }}"></script>

</body>
</html>
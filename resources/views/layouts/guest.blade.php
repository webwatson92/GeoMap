<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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


        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="container-login100" style="background-image: url('login_css/images/marguerite.jpg');">

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        </div>

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

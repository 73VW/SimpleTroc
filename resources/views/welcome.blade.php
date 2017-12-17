<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SimpleTroc') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
    <!-- Styles -->
</head>
<body>
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                SimpleTroc
            </div>
            @if (Route::has('login'))
            <div class="links">
                @auth
                <a href="{{ url('/profile') }}">Profile</a>
                @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('home') }}">Enter the mystical</a>
                <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            @endif
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>
</body>
</html>

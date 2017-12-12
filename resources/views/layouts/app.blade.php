<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/assets/owl.carousel.min.css">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
      body{
        background-color: #f3f2f7;
      }

      .navbar {
        background-color: #563d7c;
      }
    </style>
</head>
<body>
    <div id="root">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="">
      <a class="navbar-brand" href="#">SimpleTroc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse row" id="navbarsExampleDefault">
        <ul class="navbar-nav col-md-11">
            <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="/profile/products">My products</a>
            <a class="nav-link" href="/profile/products/create">Add product</a>
            <a class="nav-link" href="/profile/edit">Update profile</a>
        </ul>
        <ul class="navbar-nav col-md-1">
            @auth
              <li>
                  <a  class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                         Logout
                  </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                 </form>
              </li>
            @else
                <a class="nav-link href="{{ route('login') }}">Login</a>
                <a class="nav-link href="{{ route('register') }}">Register</a>
             @endauth

        </ul>
      </div>
    </nav>
    <br>

    @include('layouts.errors')
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.2.0/dist/owl.carousel.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-cookie-master/src/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
    @yield('scripts')
</body>
</html>

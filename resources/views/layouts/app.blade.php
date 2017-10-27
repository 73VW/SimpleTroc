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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fancybox.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.min.css">

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
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="navbar-nav">
            @auth
              <li class="nav-item dropdown mr-md-1">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">My products</a>
                    <a class="dropdown-item" href="/profile/edit">Update profile</a>
                    <a class="dropdown-item" href="/profile/products">See product</a>
                    <a class="dropdown-item" href="/profile/products/create">Add product</a>
                  </div>
              </li>
              <li>
                  <a  class="nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
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
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/fancybox.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.min.js"></script>
    @yield('scripts');
</body>
</html>

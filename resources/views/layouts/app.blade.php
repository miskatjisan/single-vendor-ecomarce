<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dream Shop</title>
    
    <!--bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/bootstrap/bootstrap.min.css')}}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/fontawsome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
    .navbar{
    padding: 20px 0px;
}
.navbar-brand{
    font-size: 28px;
    font-weight: 400;
    line-height: 36px;
    text-align: center;
    text-transform: uppercase;
    color:black;

 
}
.navbar-brand span{
    font-size: 48px;
    font-weight: 800;
    line-height: 36px;
    letter-spacing: 3px;
    text-align: center;
    text-transform: capitalize;
    color: tomato;
}
.nav-link{
    font-size: 18px;
    text-transform: capitalize;
    font-weight: 600;
    line-height: 24px;
    letter-spacing: 1;
}
.card-title{
    font-size: 32px;
    padding: 20px 0px;
    text-transform: uppercase;
    font-weight: 800;
    line-height: 24px;
    letter-spacing: 1;
    color: black;
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                Dream<span>Shop</span>
                </a>
                <!---{{ config('app.name', 'T-shop') }}-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    Porfile
                                      
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('frontend/bootstrap/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

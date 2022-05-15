<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidenav.js') }}" ></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3css.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body>
<div id="app">
    <div id="wrapper" class="sidenav">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h3><img  src="/images/review-icon-png-25.jpg" style="height: 35px;">ReviewME</h3>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>

        <hr>
        <ul>
            <li><a class="active" href="admin">Home</a></li>
            <li><a href="/products">Products</a></li>
            <li><a href="/reviews">Product Reviews</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
    <nav id="top" class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: whitesmoke">
        <span class="navbar-toggler-icon" onclick="openNav()" style="margin-right: 4em"></span>
        <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/review-icon-png-25.jpg" style="height: 35px" class="pr-2" >
                ReviewMe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->


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
                                {{ Auth::user()->email }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    <main id="main" style="background-color: #1a1e21;">
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
        </div>
        @yield('styles')
        @yield('content')
    </main>
    <div class="footer" style="width:100%">
{{--        @include('layouts.footer')--}}
    </div>
</div>

@livewireScripts
@yield('scripts')
</body>
</html>

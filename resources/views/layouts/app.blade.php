<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beauty Salon') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div id="app">
        <nav class="fixed-top navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Beauty Salon') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('parlours') }}">{{ __('Parlours') }}</a>
                            </li>
                            @if(Auth::user()->role == 'Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/dashboard') }}">{{ __('Services') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('parlours/create') }}">{{ __('Add_Parlour') }}</a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 'Customer')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('service') }}">{{ __('Services') }}</a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 'Super Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('addSliderImage.create') }}">{{ __('Select_Slider_Image') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/users') }}">{{ __('Users') }}</a>
                            </li>
                            @endif
                            
                            <li class="nav-item dropdown login-info d-inline rounded">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <?php $photo = '/'.Auth::user()->photo ?>
                                    <img class="dp rounded-circle" src="{{ asset('img/users/') }}<?php echo $photo; ?>">{{ Auth::user()->f_name }} {{ Auth::user()->l_name }}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu bg-dark navbar-dark dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="nav-link dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="navbar-margin-bottom"></div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

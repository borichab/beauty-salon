<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beauty Salon') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div id="app">
        <!-- Navbar -->
        <nav class="fixed-top navbar navbar-expand-md navbar-dark bg-gradient shadow-sm justify-content-between">
            <div class="left">
                <a class="navbar-brand fw-bold fs-4 text-light" href="{{ url('/') }}">
                    <i class="fas fa-spa"></i> {{ config('app.name', 'Beauty Salon') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="rigth">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            @if(!Auth::user()->role == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('parlours') }}">
                                        <i class="fas fa-building"></i> {{ __('Parlours') }}
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->role == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('admin/dashboard') }}">
                                        <i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}
                                    </a>
                                </li>
                                @if (!App\parlours::where('user_id', Auth::user()->id)->exists())
                                    <a class="nav-link text-light" href="{{ url('parlours/create') }}">
                                        <i class="fas fa-plus-circle"></i> {{ __('Add Parlour') }}
                                    </a>
                                @else
                                <?php $parlour = App\parlours::where('user_id', Auth::user()->id)->first(); ?>
                                <a class="nav-link text-light" href="{{ url('parlours/'.$parlour->id) }}">
                                    <i class="fas fa-eye"></i> {{ __('View Parlour') }}
                                </a>
                                <a class="nav-link text-light" href="{{ url('parlours/'.$parlour->id.'/edit') }}">
                                    <i class="fas fa-edit"></i> {{ __('Edit Parlour') }}
                                </a>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('appointmentrequests') }}">
                                        <i class="fas fa-calendar-check"></i> {{ __('Check Appointments') }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('parlours') }}">
                                        <i class="fas fa-building"></i> {{ __('Parlours') }}
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->role == 'Customer')
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('service') }}">
                                        <i class="fas fa-concierge-bell"></i> {{ __('Services') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('appointments') }}">
                                        <i class="fas fa-calendar"></i> {{ __('Appointments') }}
                                    </a>
                                </li>
                            @endif

                            @if(Auth::user()->role == 'Super Admin')
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('addSliderImage.create') }}">
                                        <i class="fas fa-image"></i> {{ __('Select Slider Image') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ url('/users') }}">
                                        <i class="fas fa-users"></i> {{ __('Users') }}
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="rounded-circle me-2" src="{{ asset('img/users/' . Auth::user()->photo) }}" alt="Profile" style="width: 30px; height: 30px; object-fit: cover;">
                                    {{ Auth::user()->f_name }} {{ Auth::user()->l_name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <main class="py-5 mt-5">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

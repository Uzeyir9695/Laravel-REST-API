<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/test.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> --}}
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

   {{-- Ajax --}}
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

   {{-- Font Awesome Link --}}
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    {{-- Animation.css  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    {{-- Admin LTE links --}}
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-md sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/index') }}">
                    {{-- {{ config('app.name', 'MixedWeb') }} --}}
                    <p class="brandName">MixedWeb</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center justify-content-center mr-2 main-nav" style="border-right: 2px solid white">
                        <li class="nav-item mr-2 pl-2 {{ 'index' == request()->path() ? 'active' : '' }}"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item mr-2 pl-2 {{ 'about' == request()->path() ? 'active' : '' }}"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                        <li class="nav-item mr-2 pl-2 {{ 'blog' == request()->path() ? 'active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                        <li class="nav-item mr-2 pl-2 {{ 'shopping' == request()->path() ? 'active' : '' }}"><a class="nav-link" href="{{ route('shopping') }}">Shopping</a></li>
                        <li class="nav-item mr-2 pl-2 {{ 'contact' == request()->path() ? 'active' : '' }}"><a class="nav-link" href="{{ route('contactUs') }}">Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav  d-flex align-items-center justify-content-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     Hello,
                                     @can('isTeacher')
                                      Teacher
                                      @elsecan('isAdmin')
                                      Admin
                                      @else
                                      Student
                                     @endcan 
                                     {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right profile" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="#">Settings</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a href="#" id="cartDropdown" data-toggle="dropdown" class="nav-link"><i class="fas fa-cart-plus" style="font-size: 22px"></i></a>
                                <div class="dropdown-menu  mt-2 cart-area animate__animated animate__pulse "  aria-labelledby="cartDropdown">
                                    <div class="cart">
                                        <i class="fas fa-caret-up"></i>
                                            <h5 class="cart-title p-3"><i class="fas fa-cart-plus mr-2" style="font-size: 19px"></i>Your Card</h5>
                                        <div class="cart-body px-3 pt-4">
                                            <h6>Subtotal </h6>
                                            <h6>$0.00</h6>
                                        </div>
                                        <hr>
                                        <div class="cart-footer pb-3 px-3">
                                            <form action="#" method="POST">
                                                 <button type="submit">View Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @can('isAdmin')

        @include('mixedweb.admin')
       
        @else

        <main>
            @yield('content')
        </main>
        @yield('createblog')
        @yield('blogView')
        @yield('blog')
        @yield('ssd-cards')
        @yield('support')
        @yield('footer')
        
        @endcan
        
    </div>
</body>
</html>

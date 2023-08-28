<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Usando Vite --}}
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-sm navbar-light shadow-sm justify-content-center p-0">
            <div class="container p-0">
                <div class="navbar-brand m-0 p-0">
                    <img src="{{ Vite::asset('resources/img/coloratofinale_360.png') }}" alt="logo_sito">
                </div>
                {{-- Logo --}}

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    
                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                            @if (Route::is('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        Registrati
                                        {{-- <x-button-nav :message="Accedi"> --}}
                                    </a>
                                </li>
                            @endif
                            @if (Route::is('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        Login
                                        {{-- <x-buttonNav :message="Registrati"> --}}
                                    </a>
                                </li>
                            @endif
                        @endguest
                        @auth
                            @if (Route::is('myfoords'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('MyOrders') }}">
                                        Ordini
                                        {{-- <x-buttonNav :message="Ordini"> --}}
                                    </a>
                                </li>
                            @elseif (Route::is('myorders'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('MyFoods') }}">
                                        Piatti
                                        {{-- <x-buttonNav :message="Piatti"> --}}
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                Homepage
                                {{-- <x-buttonNav :message="Homepage"> --}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>



{{-- componente bottone :message=""
    @guest
        @if (Route::has('register'))
        bottone Accedi
        @if (Route::has('login'))
        bottone Iscriviti
        @endif
    @endguest

    @auth
        @if (Route::has('MyFoods'))
        bottone Ordini
        @if (Route::has('MyOrders'))
        bottone Piatti
        @endif
    @endauth

    bottone homepage
--}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IPMS') }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="/static/images/favicon.ico"> -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <!-- Style RTL Css -->
    <link rel="stylesheet" href="{{asset('css/style.rtl.css')}}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Header -->
        <div class="row">
            <div id="header">
                <div class="navigation fixed-top background scroll">
                    <div class="container">
                        <nav id="navbar-example" class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand brand-logo" target="-blank" href="http://wakeb.tech/">
                                <img src="{{asset('images/logo.png')}}" alt="Wakeb" title="Wakeb">
                            </a>

                            <button class="navbar-toggler hamburger " style=" visibility: visible;" type="button"
                                    data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content"
                                    aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburger-box">
                            <span class="hamburger-label"></span>
                            <span class="hamburger-inner"></span>
                          </span>
                            </button>

                            <div class="top-nav collapse navbar-collapse" id="nav-content">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a href="{{url('/')}}">الرئيسية</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">المنتجات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">الخدمات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">الحلول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">الأخبار</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">من نحن</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">تواصل معنا</a>
                                    </li>
                                    <li class="nav-item d-flex align-items-center">
                                        <a href="index.html">
                                            <img src="{{asset('images/lang.png')}}" class="mr-1">
                                            <span>الانجليزية</span>
                                        </a>
                                    </li>
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
                                            {{--                                    {{ __('Login') }}--}}
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{--                                            {{ __('Logout') }}--}}
                                                    تسجيل خروج
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--/. Header -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

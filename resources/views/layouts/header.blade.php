<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="This is the private blog of Marina Mavrommati. Opinions about fashion, handcrafts,interior design, lifestyle & more!">
        <meta name="keywords" content="knit,stitch,Marina Mavrommati,fasion,handcrafts,interior design,lifestyle">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Sta8is @deepseacoding.com">

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script src="{{ mix('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ url('/js/customJS.js') }}"></script>
        <title>Knit & Stitch | @yield('title')</title>

    </head>
    <body>

      <div class="wrapper">
<!-- Here starts the header -->
        <div class="container">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container text-right">
                        <a class="navbar-brand hidden-when-large handwriting fs-25" href="{{ url('/') }}">
                            {{ config('app.name', 'Knit & Stitch') }}
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto hidden-when-large text-center">
                              <li class="nav-item active">
                                <a class="nav-link handwriting fs-12" href="{{ url('/') }}">home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link handwriting fs-12" href="#">knits<span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link handwriting fs-12" href="{{ url('/posts') }}">stitces <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link handwriting fs-12" href="{{ url('/about') }}">about me <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link handwriting fs-12" href="{{ url('/contact') }}">contact me <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link handwriting fs-12" href="#">instagram <span class="sr-only">(current)</span></a>
                              </li>
                              <div class="dropdown-divider"></div>
                            </ul>

                            <!-- Right Side Of Navbar -->

                            <!-- Search Form -->

                            <ul class="navbar-nav ml-auto text-left">
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle big" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search</a>
                                  <div class="dropdown-menu">
                                    <form action="{{ url('/search') }}" method="POST" role="search" class="dropdown-item form-inline my-2 my-lg-0">
                                      {{ csrf_field() }}
                                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
                                      <button class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit">Search</button>

                                    </form>
                                    <p class="fs-06 text-center">Εισάγετε τη λέξη-κλειδί, της αναζήτησης</p>
                                  </div>
                              </li>

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
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            @if (! Auth::user()->role == 'admin')
                                            <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">To προφίλ μου
                                            </a>
                                            @endif
                                            @if (Auth::user()->role == 'admin')
                                              <a class="dropdown-item" href="/admin">Πίνακας Ελέγχου
                                              </a>
                                            @endif

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div> <!--here ends collapse navbar -->
                                    </li>
                                @endguest

                            </ul>

                        </div> <!--here ends collapse navbar -->
                    </div> <!--here ends container -->
                </nav>
                <div class="hidden-when-small no-link-style">
                  <a href="{{ url('/') }}">
                    <img src="/images/logo.png" alt="logo" class="logo-img img-fluid
                    ">
                  </a>
                </div>

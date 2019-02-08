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
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <title>Knit & Stitch | Dashboard</title>
    </head>

    <body style="background-color: #dddddd;">

      <div class="container">
        <h3 class="text-center py-3">Πίνακας Ελέγχου</h3>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/')}}">Πίσω στη σελίδα</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

@if(!Auth::guest())

    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKnits" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Χειροτεχνήματα
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownKnits">
          <a class="dropdown-item" href="#">Νέο Χειροτέχνημα</a>
          <a class="dropdown-item" href="#">Επεξεργασία Χειροτεχνημάτων</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownStitches" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Δημοσιεύματα
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownStitches">
          <a class="dropdown-item" href="{{ url( '/posts/create') }}">Νέο Δημοσίευμα</a>
          <a class="dropdown-item" href="#">Επεξεργασία Δημοσιευμάτων</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownStitches" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Συλλογή Εικόνων
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownStitches">
          {{-- <a class="dropdown-item" href="{{ url( '/photos/create') }}">Ανεβασμα Νέας Εικόνας</a> --}}
          <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
            Ανέβασμα Νέας Εικόνας
          </a>

          <a class="dropdown-item" href="{{ url( '/photos') }}">Επεξεργασία Εικόνων</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          Σχόλια
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Χρήστες</a>
      </li>
    </ul>
@endif

<!-- Authentication Links -->
@guest
      <li class="ml-auto nav-item list-style-no-style">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
          <li class="nav-item list-style-no-style">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif

      @else
      <li class="nav-item dropdown list-style-no-style">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <a class="dropdown-item" href="{{ route('dashboard') }}">Πίνακας Ελέγχου
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div> <!--here ends collapse navbar -->
      </li>
@endguest

    </div> <!--here ends collapse navbar -->
</nav>

@include('layouts.messages')

@yield('content')

          <footer class="navbar navbar-expand-lg navbar-light bg-light mt-5 justify-content-center">
                    <p class="pt-2">designed and created by <a href="https://deepseacoding.com">deepSeaCoding.com</a></p>
          </footer>
      </div> <!--here ends container -->
<!--modal-->
@include('photos.create')

    </body>
</html>

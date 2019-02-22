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
        <title>Knit & Stitch | Dashboard</title>
    </head>

    <body style="background-color: #d5c5b8;">

      <div class="container">
        <h3 class="text-center py-3">Dashboard</h3>
        <nav class="navbar navbar-expand-lg navbar-light crem">
  <a class="navbar-brand" href="{{ url('/')}}">Back to Site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

@if(! Auth::guest())
  @if (Auth::user()->role == 'admin')

    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKnits" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Knits
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownKnits">
          <a class="dropdown-item" href="#">New Knit</a>
          <a class="dropdown-item" href="#">Manage Knits</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownStitches" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stitches
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownStitches">
          <a class="dropdown-item" href="{{ url( '/posts/create') }}">New Stitch</a>
          <a class="dropdown-item" href="{{ url( '/admin/posts') }}">Manage Stitches</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownStitches" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Images
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownStitches">
          {{-- <a class="dropdown-item" href="{{ url( '/photos/create') }}">Ανεβασμα Νέας Εικόνας</a> --}}
          <a class="dropdown-item" data-toggle="modal" data-target="#uploadPicture" style="cursor: pointer;">
            Upload New Image
          </a>
          <a class="dropdown-item" href="{{ url( '/photos') }}">Image Gallery</a>
          <a class="dropdown-item" href="{{ url( '/carousel') }}" >Manage Carousel</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Users</a>
      </li>
    </ul>
  @endif
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
      <li class="nav-item dropdown list-style-no-style ml-auto">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              @if (Auth::user()->role == 'admin')
                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard
                </a>
              @endif

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div> <!--here ends collapse navbar -->
      </li>
@endguest

    </div> <!--here ends collapse navbar -->
</nav>

@include('layouts.messages')

            <div class="card crem">
              <div class="card-body">
                @yield('content')
              </div>
            </div>

          <footer class="navbar navbar-expand-lg navbar-light crem justify-content-center">
                    <p class="pt-2">designed and created by <a href="https://deepseacoding.com">deepSeaCoding.com</a></p>
          </footer>
      </div> <!--here ends container -->
<!--modal-->
@include('photos.create')

    </body>
</html>

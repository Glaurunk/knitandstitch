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
        <div class="row mt-2"><p>Dashboard</p></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ url('/')}}">Knit and Stitch</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKnits" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Knits
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownKnits">
          <a class="dropdown-item" href="#">Create new Knit</a>
          <a class="dropdown-item" href="#">Edit Knits</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownStitches" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Stitches
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownStitches">
          <a class="dropdown-item" href="{{ url( '/posts/create') }}">Create new Stitch</a>
          <a class="dropdown-item" href="#">Edit Stitches</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          Comments
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Users</a>
      </li>
    </ul>


    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>

    </div> <!--here ends collapse navbar -->
  </div> <!--here ends container -->
</nav>

@include('layouts.messages')

@yield('content')

          <footer class="navbar navbar-expand-lg navbar-light bg-light mt-5 justify-content-center">
                    <p class="pt-2">designed and created by <a href="https://deepseacoding.com">deepSeaCoding.com</a></p>
          </footer>
      </div> <!--here ends container -->
    </body>
</html>

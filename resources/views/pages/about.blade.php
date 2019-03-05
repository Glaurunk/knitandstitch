@extends('layouts.app')

@section('title', 'About Me')

@section('content')


  <h1 class="handwriting py-5 text-center">About Me</h1>
  <div class="row">
      <img src="{{ url('/images/Marinaki.png') }}" alt="Marina" class="img-fluid rounded mx-auto ">

  <div class="col-auto py-5">
      <p class="dark-brown text-moccha p-3 fs-12 handwriting ls-3 rounded">Hey everybody! My name is Marina Mavrommati and I am a hobbyist designer from Athens-GREECE. My favourite superhero is - of course - Batman and my favourite treat cotton candy!</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <img src="{{ url('/images/batman.png') }}" alt="batman" class="img-fluid float-right px-5">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div> <!-- here ends col -->
</div> <!-- here ends row -->


@endsection

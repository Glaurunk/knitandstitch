@extends('layouts.app')

@section('title', 'Contact Me')

@section('content')
  <h1 class="handwriting py-5">Contact me</h1>
  <div class="row p-2 mb-5">
    <div class="col ml-5">
      <img src="{{ url('/images/batmail.png')}}" alt="batmail" class="img-fluid">
    </div>
    <div class="col align-self-center mr-5">
      <p class="text-center">Need more information about my handcrafts, or how to get them? Need personalized advice on some topic? Need clarifications about some obscure post? Feel free to ask!</p>
      <p class="handwriting fs-20 text-center "><a href="mailto:marin.mavrommati@gmail.com">marin.mavrommati@gmail.com</a></p>
    </div>
  </div>

@endsection

@extends('layouts.app')
@section('title', 'Home Page')

@section('content')

<div class="content my-5">

<!-- Knits Section with carousel -->
  <h1 class="handwriting text-center">latest knits!</h3>
    <div class="row slider mt-4">
      <div id="carouselExampleIndicators" class="carousel slide slider" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ url('images/demo1.jpg?auto=yes&bg=777&fg=555&text=First slide') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('images/demo2.jpg?auto=yes&bg=777&fg=555&text=Second slide') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('images/demo3.jpg?auto=yes&bg=777&fg=555&text=Third slide') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('images/demo4.jpg?auto=yes&bg=777&fg=555&text=Fourth slide') }}" alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('images/demo5.jpg?auto=yes&bg=777&fg=555&text=Fifth slide') }}" alt="Fifth slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> <!-- here ends carousel -->
  </div> <!-- here ends row slider -->
</div> <!-- here ends content -->

<!-- Stitches Section -->
<h1 class="handwriting text-center">latest stitches!</h3>
<!-- Buttons row -->
<div class="row flex-row justify-content-center mt-5">
  <div class="col-auto">
    <a href="{{ route('fashion') }}" class=""><div class="">
      <p class="but-fashion hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="{{ route('fashion') }}" >fashion</a></p>
  </div> <!-- here ends button #1 -->
  <div class="col-auto">
    <a href="{{ route('self_care') }}" class=""><div class="">
      <p class="but-self-care hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="{{ route('self_care') }}" >self-care</a></p>
  </div> <!-- here ends button #2 -->
  <div class="col-auto">
    <a href="{{ route('my_house') }}" class=""><div class="">
      <p class="but-house hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="{{ route('my_house') }}" >my house</a></p>
  </div> <!-- here ends button #3 -->
  <div class="col-auto">
    <a href="{{ route('inspiration') }}" class=""><div class="">
      <p class="but-novelties hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="{{ route('inspiration') }}">inspiration</a></p>
  </div> <!-- here ends button #4 -->
</div> <!-- here ends row -->

<!-- Posts Section -->

<div class="card-columns my-5 d-inline-block">


  @foreach ($posts as $post)

    <div class="card fp-card mb-2">
      <div class="card-block p-3 text-center">
                <img src="/storage/cover_images/{{ $post->cover_image }}" alt="image" class="img-fluid rounded mb-3">
                <h5 class="text-center handwriting mb-3"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h5>
                <p class="font-italic fs-08 ">Category: <a href="#">{{ $post->category }}</a> | {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</p>
                <p class="text-justify hyphen fs-08">{{ $post->synopsis }}</p>
      </div> <!-- here ends card-block -->
    </div> <!-- here ends card -->

  @endforeach


</div> <!-- here ends card-columns -->

<div class="row pb-5">
  <img src="{{ url('/images/batcraft.png')}}" alt="batcraft" class="img-fluid mx-auto">
</div>



@endsection

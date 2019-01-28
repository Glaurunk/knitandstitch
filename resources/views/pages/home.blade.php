@extends('layouts.app')
@section('title', 'Home Page')

@section('content')

<div class="content my-5">
  <h1 class="handwriting text-center">latest knits!</h3>
    <div class="row slider">
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
          <img class="d-block w-100" src="images/demo1.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/demo2.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/demo3.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/demo4.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Fourth slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/demo5.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Fifth slide">
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


@endsection

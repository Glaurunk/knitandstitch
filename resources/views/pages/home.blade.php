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

<!-- Stitches Section -->
<h1 class="handwriting text-center">latest stitches!</h3>
<!-- Buttons row -->
<div class="row flex-row justify-content-center mt-5">
  <div class="col-auto">
    <a href="#" class=""><div class="">
      <p class="but-fashion hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="#" >fashion</a></p>
  </div> <!-- here ends button #1 -->
  <div class="col-auto">
    <a href="#" class=""><div class="">
      <p class="but-self-care hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="#" >self-care</a></p>
  </div> <!-- here ends button #2 -->
  <div class="col-auto">
    <a href="#" class=""><div class="">
      <p class="but-house hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="#" >my house</a></p>
  </div> <!-- here ends button #3 -->
  <div class="col-auto">
    <a href="#" class=""><div class="">
      <p class="but-novelties hover-1 text-red"></p>
    </div></a>
    <p class=" text-center fs-14 handwriting text-red"><a href="#" >novelties</a></p>
  </div> <!-- here ends button #4 -->
</div> <!-- here ends row -->

<!-- Posts Section -->

<div class="card-columns my-5 d-inline-block">
    <div class="card fp-card">
      <div class="card-body">
        <h3 class="card-title handwriting text-center pb-2">Latest Post #1</h3>
        <small>date | category</small>
        <p class="text-justify text-justify  p-card pt-3" id="p1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p class="btn-link fs-08  show-more hidden" id="show-more-1" onclick="showMore('show-more-1','show-less-1','p1')">read more...</p>
        <p class="btn-link  fs-08 show-less hidden" id="show-less-1" onclick="showMore('show-more-1','show-less-1','p1')">read less...</p>
      </div> <!-- here ends card body -->
    </div> <!-- here ends card -->
    <div class="card fp-card">
      <div class="card-body">
        <h3 class="card-title handwriting text-center pb-2">Latest Post #2</h3>
        <small>date | category</small>
        <p class="text-justify text-justify  p-card pt-3" id="p2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in re.</p>
        <p class="btn-link fs-08  show-more hidden" id="show-more-2" onclick="showMore('show-more-2','show-less-2','p2')">read more...</p>
        <p class="btn-link  fs-08 show-less hidden" id="show-less-2" onclick="showMore('show-more-2','show-less-2','p2')">read less...</p>
      </div> <!-- here ends card body -->
    </div> <!-- here ends card -->
    <div class="card fp-card">
      <div class="card-body">
        <h3 class="card-title handwriting text-center pb-2">Latest Post #3</h3>
        <small>date | category</small>
        <p class="text-justify text-justify  p-card pt-3" id="p3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        <p class="btn-link fs-08  show-more hidden" id="show-more-3" onclick="showMore('show-more-3','show-less-3','p3')">read more...</p>
        <p class="btn-link  fs-08 show-less hidden" id="show-less-3" onclick="showMore('show-more-3','show-less-3','p3')">read less...</p>
      </div> <!-- here ends card body -->
    </div> <!-- here ends card -->

    <div class="card fp-card">
      <div class="card-body">
        <h3 class="card-title handwriting text-center pb-2">Latest Post #4</h3>
        <small>date | category</small>
        <p class="text-justify text-justify  p-card pt-3" id="p4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia .</p>
        <p class="btn-link fs-08  show-more hidden" id="show-more-4" onclick="showMore('show-more-4','show-less-4','p4')">read more...</p>
        <p class="btn-link  fs-08 show-less hidden" id="show-less-4" onclick="showMore('show-more-4','show-less-4','p4')">read less...</p>
      </div> <!-- here ends card body -->
    </div> <!-- here ends card -->

    <div class="card fp-card">
      <div class="card-body">
        <h3 class="card-title handwriting text-center pb-2">Latest Post #5</h3>
        <small>date | category</small>
        <p class="text-justify  p-card pt-3" id="p5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        <p class="btn-link fs-08  show-more hidden" id="show-more-5" onclick="showMore('show-more-5','show-less-5','p5')">read more...</p>
        <p class="btn-link  fs-08 show-less hidden" id="show-less-5" onclick="showMore('show-more-5','show-less-5','p5')">read less...</p>
      </div> <!-- here ends card body -->
    </div> <!-- here ends card -->

    <div class="card fp-card" id="card6">
      <div class="card-body">
        <h3 class="card-title handwriting text-center pb-2">Latest Post #6</h3>
        <small>date | category</small>
        <p class="text-justify  p-card pt-3" id="p6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
        <p class="btn-link fs-08  show-more hidden" id="show-more-6" onclick="showMore('show-more-6','show-less-6','p6')">read more...</p>
        <p class="btn-link  fs-08 show-less hidden" id="show-less-6" onclick="showMore('show-more-6','show-less-6','p6')">read less...</p>
      </div> <!-- here ends card body -->
    </div> <!-- here ends card -->

</div> <!-- here ends card-columns -->

<div class="row pb-5">
  <img src="/images/batcraft.png" alt="batcraft" class="img-fluid mx-auto">
</div>



@endsection

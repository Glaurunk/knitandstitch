@extends('layouts.app')
@section('title', 'Home Page')

@section('content')

<div class="content my-5">

<!-- Knits Section with carousel -->
  <h1 class="handwriting text-center"><a href="/knits">latest knits!</a></h3>
    @include('layouts.carousel')
</div> <!-- here ends content -->

<!-- Stitches Section -->
<h1 class="handwriting text-center"><a href="/posts">latest stitches!</a></h3>
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
                <img src="/gallery/{{ $post->cover_image }}" alt="image" class="img-fluid rounded mb-3">
                <h5 class="text-center handwriting mb-3"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h5>
                <p class="font-italic fs-08 ">Category: <a href="#">{{ $post->category }}</a> | {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</p>
                <p class="text-justify hyphen">{{ $post->synopsis }}</p>
      </div> <!-- here ends card-block -->
    </div> <!-- here ends card -->

  @endforeach


</div> <!-- here ends card-columns -->

<div class="row pb-5">
  <img src="{{ url('/images/batcraft.png')}}" alt="batcraft" class="img-fluid mx-auto">
</div>



@endsection

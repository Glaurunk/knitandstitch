@extends('layouts.app')

@section('content')

  <div class="card fp-card mb-2 mt-5 p-5">
    <div class="card-block p-3">
      <div class="row">
        <div class="col-md-4 col-sm-4 ">
              <img src="/storage/cover_images/{{ $post->cover_image }}" alt="image" class="img-fluid rounded">
        </div>
        <div class="col-md-8 col-sm-8">
              <h4 class="text-danger handwriting">{{ $post->title }}</h4>
              <h6 class="font-italic pt-2 pb-3">category: <a href="/{{ $post->category }}">{{ $post->category }}</a> | {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</h6>
              {{-- <p>{{ $post->synopsis }}</p> --}}
              <p>{!! $post->body !!}</p>
        </div> <!-- here ends col -->
      </div> <!-- here ends row -->

      <a href="{{ url()->previous() }}" class=" float-right">go back!</a>

    </div> <!-- here ends card block -->
  </div> <!-- here ends card -->

  {{-- @include('auth.buttons') --}}

@endsection

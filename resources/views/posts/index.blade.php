@extends('layouts.app')

@section('content')

  <h1 class="handwriting py-5" id="top">My Stitches</h1>

  @if(count($posts) > 0)


        @foreach ($posts as $post)

          <div class="card fp-card mb-2">
            <div class="card-block p-3">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                      <img src="/storage/cover_images/{{ $post->cover_image }}" alt="image" class="img-fluid rounded">
                </div>
                <div class="col-md-8 col-sm-8">
                      <h4 class="handwriting"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                      <h6 class="font-italic pt-2 pb-3">Category: <a href="#">{{ $post->category }}</a> | {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</h6>
                      <p>{{ $post->synopsis }}</p>
                </div> <!-- here ends col -->
              </div> <!-- here ends row -->
            </div> <!-- here ends card-block -->
          </div> <!-- here ends card -->

          @include('auth.buttons')


        @endforeach

  @else

    <p>No posts found</p>

  @endif

  <p>{{ $posts->links() }}</p>
  <a href="#top">back to top</a>
@endsection

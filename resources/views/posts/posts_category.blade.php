@extends('layouts.app')

@section('content')

  <h1 class="handwriting py-5" id="top">category: {{ $category }}</h1>

  @if(count($posts) > 0)

        @foreach ($posts as $post)

          <div class="card fp-card mb-2">
            <div class="card-block p-3">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                      <img src="/storage/photos/{{ $post->cover_image }}" alt="image" class="img-fluid rounded">
                </div>
                <div class="col-md-8 col-sm-8">
                      <h4 class="handwriting"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                      <small class="font-italic pt-2 pb-3">{{ $post->created_at }}</small>
                      <p class="mt-3">{{ $post->synopsis }}</p>
                </div> <!-- here ends col -->
              </div> <!-- here ends row -->
            </div> <!-- here ends card-block -->
          </div> <!-- here ends card -->


        @endforeach
  @else

    <p class="display-4 py-5">No posts found</p>

  @endif

  <p>{{ $posts->links() }}</p>
  <a href="#top">back to top</a>
@endsection

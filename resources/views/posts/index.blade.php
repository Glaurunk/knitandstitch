@extends('layouts.app')

@section('content')

  <h1 class="handwriting py-5 text-center" id="top">My Stitches</h1>

  @if(count($posts) > 0)

        @foreach ($posts as $post)

          <div class="card fp-card mb-2">
            <div class="card-block p-3">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                      <a href="/posts/{{ $post->id }}"><img src="/gallery/{{ $post->cover_image }}" alt="image" class="img-fluid rounded"></a>
                </div>
                <div class="col-md-8 col-sm-8">
                      <h4 class="handwriting"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                      <h6 class="font-italic pt-2 pb-3">Category: <a href="/{{ $post->category }}">{{ $post->category }}</a> | {{ $post->created_at }}</h6>
                      <p>{{ $post->synopsis }}</p>
                      @if (count($post->comments) > 0)
                        @if (count($post->comments) == 1)
                          <small><em>{{ count($post->comments)}} comment</em></small>
                        @else
                          <small><em>{{ count($post->comments)}} comments</em></small>
                        @endif
                      @endif
                </div> <!-- here ends col -->
              </div> <!-- here ends row -->
            </div> <!-- here ends card-block -->
          </div> <!-- here ends card -->

        @endforeach
  @else

    <p>No Stitches Found!</p>

  @endif

  <p>{{ $posts->links() }}</p>
  <a href="#top">back to top</a>
@endsection

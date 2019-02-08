{{-- @if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id) --}}
    <div class="row pt-2 pb-5">
      <div class="col-auto">
        <a href="/posts/{{ $post->id }}/edit" class="btn btn-secondary btn-sm">Edit Post</a>
      </div>
      <div class="col-auto">
        <form class="form" action="/posts/{{ $post->id }}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger btn-sm">Delete Post</button>
        </form>
      </div>
    </div>
  {{-- @endif
@endif --}}

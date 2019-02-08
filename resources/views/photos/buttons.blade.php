{{-- @if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id) --}}
  @include('layouts.confirmDelete')

        <form action="/photos/{{ $photo->id }}" method="post">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <div class="row justify-content-center">
            <a href="/photos/{{ $photo->id }}/edit" class="btn btn-secondary mr-2 btn-sm">edit</a>
            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete()">del</button>
          </div>
        </form>
  {{-- @endif
@endif --}}

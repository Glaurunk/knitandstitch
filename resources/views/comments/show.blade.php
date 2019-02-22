@extends('layouts.app')
@section('content')
  <div class="card fp-card mb-2 mt-5 p-5">
    <div class="card-block p-3">

        <form class="form" action="/comments/{{ $comment->id }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <label for="commentsArea">comment created on <em>{{ $comment->created_at }}</em>. Last update:
            @if ($comment->created_at == $comment->updated_at)
              <em>never</em>
              @else
                <em>{{ $comment->updated_at }}</em>.
            @endif
          </label>
          <textarea name="body" class="form-control mb-3" id="commentsArea">{{ $comment->body }}</textarea>
          <input type="hidden" name="post_id" value="{{ $comment->post->id }}">
          <button type="submit" class="btn btn-outline-danger btn-sm">Update</button>
          <a href="{{ URL::previous() }}" class="btn btn-outline-dark btn-sm">Cancel</a>
      </form>

    </div> <!-- here ends card block -->
  </div> <!-- here ends card -->

@endsection

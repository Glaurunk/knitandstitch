@extends('layouts.app')

@section('content')
<!-- Post Section -->
  <div class="card fp-card mb-2 mt-5 p-5">
    <div class="card-block p-3">
      <div class="row">
        <div class="col-md-4 col-sm-4 ">
              <img src="/storage/photos/{{ $post->cover_image }}" alt="image" class="img-fluid rounded">
        </div>
        <div class="col-md-8 col-sm-8">
              <h4 class="text-danger handwriting">{{ $post->title }}</h4>
              <h6 class="font-italic pt-2 pb-3">category: <a href="/{{ $post->category }}">{{ $post->category }}</a> | {{ $post->created_at->day }}/{{ $post->created_at->month }}/{{ $post->created_at->year }}</h6>
              {{-- <p>{{ $post->synopsis }}</p> --}}
              <p>{!! $post->body !!}</p>
        </div> <!-- here ends col -->
      </div> <!-- here ends row -->
    </div> <!-- here ends card block -->
  </div> <!-- here ends card -->

<!-- Comments Section -->
  @if (count($comments) > 0)
    <h4 class="text-danger handwriting text-center py-3">Σχόλια</h4>
    @foreach ($comments as $comment)

    <div class="card fp-card mb-2">
      <div class="card-block p-3">
        <div class="row">
          <div class="col-md-8 col-sm-8">
              <p>{{ $comment->body }}</p>
              <small><em>{{ $comment->user->name }} on {{ $comment->created_at }}</em></small>

<!-- Control Buttons for comment's owner -->
                @if (Auth::user()->id == $comment->user->id )
                  <div class="row ">
                    <div class="col-auto align-self-end">
                      <a href="#" class="btn btn-sm btn-outline-secondary">edit</a>
                    </div>
                    <div class="col-auto">
                    <form class="form" action="/comments/{{ $comment->id }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                    </form>
                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">delete</button>
                  </div>
                </div>
              @endif

          </div> <!-- here ends col -->
        </div> <!-- here ends row -->
      </div> <!-- here ends card block -->
    </div> <!-- here ends card -->
  @endforeach
@endif

<!-- Create button for authenticated user -->
@if (Auth::user())
  <button type="button" name="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#commentModal">Δημιουργία Σχολίου</button>
@endif

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Δημιουργία Σχολίου</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="commentsArea">Σχόλιο</label>
        <form class="form" action="/comments" method="post">
          {{ csrf_field() }}
          <textarea name="body" class="form-control" placeholder="" id="commentsArea">{{ old('body') }}</textarea>
          <input type="hidden" name="post_id" value="{{ $post->id }}">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-danger">Υποβολή</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Ακύρωση</button>
      </form>
    </div> <!-- Here ends modal footer -->
  </div> <!-- Here ends modal content -->
</div> <!-- Here ends modal dialogue -->
</div> <!-- Here ends modal -->










@endsection

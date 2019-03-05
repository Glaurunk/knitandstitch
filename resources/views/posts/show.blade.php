@extends('layouts.app')

@section('content')
<!-- Post Section -->
  <div class="card fp-card mb-2 mt-5 p-5">
    <div class="card-block p-3">
      <div class="row">
        <div class="col-md-4 col-sm-4 ">
              <img src="/gallery/{{ $post->cover_image }}" alt="image" class="img-fluid rounded">
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
    <h4 class="text-danger handwriting text-center py-3">Comments</h4>
    @foreach ($comments as $comment)

    <div class="card fp-card mb-2">
      <div class="card-block px-3 pt-3">
        <div class="row">
          <div class="col-md-9 col-sm-8">
            <small><em>{{ $comment->user->name }} wrote on {{ $comment->created_at }}
              @if ($comment->created_at != $comment->updated_at)
                 and updated this comment on {{ $comment->updated_at }}
              @endif
            </em></small>
<!-- Show/hide depending on the comment's state -->
<!-- State 1: Marked as innapropriate -->
            @if ($comment->state == 1)
                <br>
                <p class="fs-08"><strong>This comment has been marked as innapropriate and has been removed from the convertation.</strong></p>
                @if (! Auth::guest())
                  @if (Auth::user()->id == $comment->user_id)
                    <p class="fs-08"><em>Only you, the creator of this comment can see it. Please remove the offensive content and <a href="mailto:marin.mavrommati@gmail.com?subject=Comment Approval Petition">contact the administration</a>to return it to the convertation!</em></p>
                    <p class="pt-3">{{ $comment->body }}</p>
                  @endif
                @endif
<!-- State 2: Hidden by the original user -->
              @elseif ($comment->state == 2)
                <br>
                <p class="fs-08"><strong>This comment has been removed from the convertation by its creator.</strong></p>
                @if (! Auth::guest())
                  @if (Auth::user()->id == $comment->user_id)
                    <p class="fs-08"><em>Only you, the creator of this comment can see it now. If you change your mind you can return it to the convertation at any time!</em></p>
                    <p class="pt-3">{{ $comment->body }}</p>
                  @endif
                @endif
<!-- State 0: Normal -->
              @else
                  <p class="pt-3">{{ $comment->body }}</p>
            @endif

<!-- Control Buttons for comment's owner -->
                @if (! Auth::guest())
                  @if (Auth::user()->id == $comment->user->id )

                    <div class="row mt-3">
                      <div class="mx-3">
                        <a href="/comments/{{ $comment->id }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                      </div>
                      <form class="" action="/mark2" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Deleting a comment might break a convertation, therefore deletion is non advisable. However you, the author, can instead hide its contents from public view. If you still wish to completely remove it please contact the administration.">Toggle Visibility</button>
                      </form>
                  </div>

                @endif
              @endif

          </div> <!-- here ends col -->
        </div> <!-- here ends row -->
      </div> <!-- here ends card block -->
    </div> <!-- here ends card -->
  @endforeach
@endif

<div class="row">
  <div class="align-self-end">
    <a href="{{ URL::previous() }}
" class="
      @if (Auth::user())
        btn btn-outline-dark btn-sm
      @endif
    mx-3">back</a>
  </div>
<!-- Create button for authenticated user -->
  @if (Auth::user())
    <div class="">
      <button type="button" name="button" class="mt-3 btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#commentModal">Add a Comment</button>
    </div>
  @endif
</div>


<!-- Create Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="commentsArea">Comment</label>
        <form class="form" action="/comments" method="post">
          {{ csrf_field() }}
          <textarea name="body" class="form-control" placeholder="" id="commentsArea">{{ old('body') }}</textarea>
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <input type="hidden" name="knit_id" value="0">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-danger">Submit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
      </form>
    </div> <!-- Here ends modal footer -->
  </div> <!-- Here ends modal content -->
</div> <!-- Here ends modal dialogue -->
</div> <!-- Here ends modal -->



@endsection

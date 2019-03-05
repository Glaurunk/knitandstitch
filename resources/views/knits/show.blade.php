@extends('layouts.app')

@section('content')

  <div class="card fp-card mb-2 mt-5 p-5">
    <div class="card-block p-3">
      <h3 class="text-danger handwriting text-center">{{ $knit->name }}</h3>
      <h5 class="text-danger handwriting text-center  mt-3 mb-3">price: € {{ $knit->price }}</h5>
          <div  class="col text-center my-3 crem br-12 py-5">
<!-- The lightbox  -->
            <img id="lightbox" src="/gallery/{{ $knit->photo }} " alt="active" class="img-fluid lightbox br-12">
          </div> <!-- here ends col -->
          <p class="text-center"><em>added on {{ $knit->created_at }}</em></p>
          <hr>
<!-- If we have only the cover, hide the div else iterate -->
          @php
            $others = explode(',', $knit->other);
            array_pop($others);
          @endphp
          @if (count($others) > 0)
            <div class="row justify-content-center">
              <div class="col px-2" style="max-width:150px;">
                <img src="/gallery/{{ $knit->photo }}" alt="covers" class="slides img-fluid rounded mb-2 pointer selected" id="{{ $knit->photo }}" onclick="preview(this.src, this.id );">
              </div>

              @foreach ($others as $other)
                  <div class="col px-2" style="max-width:150px;">
                    <img src="/gallery/{{ $other }}" alt="covers" class="slides img-fluid rounded mb-2 pointer
                    " id="{{ $other }}" onclick="preview(this.src, this.id );">
                  </div>
              @endforeach
            </div>
            <hr>
          @endif

          <h4 class="handwriting text-danger text-center pt-2 pb-3">Description</h4>
          <p>{!! $knit->description !!}</p>
          <div class="">

          </div>
          </div><!-- here ends card block-->
          <a href="{{ url('/knits') }}" class=" float-right">back to knits</a>

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
          <a href="/knits" class="
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

    </div> <!-- here ends card block -->
  </div> <!-- here ends card -->


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
            <input type="hidden" name="post_id" value="0">
            <input type="hidden" name="knit_id" value="{{ $knit->id }}">
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

@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('content')
<script src=" {{ url( '../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>


  <h3 class="my-5">Update Stitch</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

      <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title" placeholder="{{ $post->title }}" value="{{ $post->title }}">
      </div>

      <div class="form-group">
          <label for="title">Category</label>
          <select class="form-control" id="category" name="category">
          <option>fashion</option>
          <option>self-care</option>
          <option>my house</option>
          <option>inspiration</option>
        </select>
      </div>

      <div class="form-group">
          <label for="synopsis">Synopsis</label>
          <textarea class="form-control" name="synopsis" placeholder="{{ $post->synopsis }}" value="{{ $post->synopsis }}"></textarea>
      </div>

      <div class="form-group">
          <label for="body">Text</label>
          <textarea class="form-control" name="body" placeholder="" id="body" value="{{ $post->body }}">{{ $post->body }}</textarea>
      </div>
<!-- Enter from URL part -->
      <div class="form-group mb-5">
          <p style="color:black;">Cover Image</p>
          <img name="img" class="img-fluid" id="cover" alt="cover" src="/gallery/{{ $post->cover_image }}" style="max-width:120px;">
          <p id="photoPath" class="py-2 green">{{ $post->cover_image }}</p>
          <button type="button" class="btn btn-outline-danger bt-3" data-toggle="modal" data-target="#inputForm">Add a cover image OR copy an image URL to the Clipboard</button><br>
          <input type="hidden" name="photo" value="" id="inputField" data-toggle="tooltip">
      </div>

<!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="inputForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fuxia" id="inputForm">Add a cover image OR copy an image URL to the Clipboard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row p-3 light-grey">
                    @foreach ($photos as $photo)
                      <div class="col-3">
                          <img class="thumbnail img-fluid" src="/gallery/{{ $photo->photo }}" alt="Photo">
                          <a href="#" class="pt-2 fuxia" onclick="copyToInput('{{ $photo->photo }}')" >add to cover</a><br>
                          <a href="#" onclick="insertPhoto('{{ $photo->photo }}')">add to clipboard</a>
                      </div>
                    @endforeach
                    <p>{{ $photos->links() }}</p>
                </div> <!-- here ends row -->
                <input type="text" value="" id="hiddenInput" style="height: 0px;">

              </div> <!-- here ends modal-body -->
              </div> <!-- here ends modal-content -->
            </div> <!-- here ends modal-dialogue -->
          </div> <!-- here ends modal -->
<!-- here ends enter from url -->

      <button class="btn btn-outline-secondary" type="submit" value="Submit" >Update</button>
      <a href="{{ url('/admin/posts') }}" class="btn btn-outline-dark">Cancel</a>
      <a class="btn btn-outline-danger" data-toggle="collapse" href="#collapseComments" role="button" aria-expanded="false" aria-controls="collapseExample">Toggle Comments</a>
    </form>

<!-- Comments Section -->
@if (count($comments) > 0)

  <div class="collapse  show" id="collapseComments">

        <h4 class="text-danger text-center py-3">Comments</h4>
        @foreach ($comments as $comment)

        <div class="card fp-card mb-2">
          <div class="card-block px-3 pt-3">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <small><em>{{ $comment->user->name }} wrote on {{ $comment->created_at }}
                  @if ($comment->created_at != $comment->updated_at)
                     and updated this comment on {{ $comment->updated_at }}
                  @endif
                  @if ($comment->state == 1)
                    <br>
                    <strong>MARKED AS INAPPROPRIATE. HIDDEN FROM PUBLIC</strong>
                  @elseif ($comment->state == 2)
                    <br>
                    <strong>HIDDEN FROM PUBLIC BY ITS AUTHOR</strong>
                  @endif
                </em></small>
                  <p class="pt-3">{{ $comment->body }}</p>

<!-- Control Buttons for admin -->
      <div class="row mt-3">

          @if ($comment->user_id == Auth::user()->id)
            <div class="col-auto">
              <a href="/comments/{{ $comment->id }}" class="btn btn-sm btn-outline-secondary">Edit my comment</a>
            </div>
            <div class="col-auto">
              <form class="" action="/mark2" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Deleting a comment might break a convertation, therefore deletion is non advisable. However you, the author, can instead hide its contents from public view. If you still wish to completely remove it please contact the administration.">Toggle Visibility</button>
              </form>
            </div>
            @else
              <div class="col-auto">
                <form class="" action="/mark" method="post">
                  {{ csrf_field() }}
                  <button class="btn btn-sm btn-outline-dark mb-3" data-toggle="tooltip" data-placement="top" title="Marks a comment as inappropriate and hide its contents from pubic view. You can reinstate it at any time." type="submit">Toggle inappropriate</button>
                  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                </form>
              </div>
          @endif

          <div class="col-auto">
            <form class="
            " action="/comments/{{ $comment->id }}" method="post">
              {{ csrf_field() }}
              {{ method_field('delete') }}
                <button type="submit" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Warning: This action will delete permanently the comment and might break the convertation!" onclick="confirmDelete()">Perma-Delete</button>
            </form>
          </div>

    </div> <!-- here end admin buttons -->

<!-- Comments closing tags -->
              </div> <!-- here ends col -->
            </div> <!-- here ends row -->
          </div> <!-- here ends card block -->
          <p>{{ $comments->links() }}</p>
        </div> <!-- here ends card -->
      @endforeach


<!-- Create comment button for admin -->
        <div class="">
          <button type="button" name="button" class="mt-3 btn btn-outline-danger" data-toggle="modal" data-target="#commentModal">Add a Comment</button>
        </div>
    </div> <!-- Here ends collapse -->
</div> <!-- Here ends main div -->
@endif


<!-- Create Coments Modal -->
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
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-danger">Submit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
      </form>
    </div> <!-- Here ends modal footer -->
  </div> <!-- Here ends modal content -->
</div> <!-- Here ends modal dialogue -->
</div> <!-- Here ends modal -->

<script>CKEDITOR.replace( 'body' );</script>

@endsection

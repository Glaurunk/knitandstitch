@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('content')
<script src=" {{ url( '../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>


  <h3 class="my-5">Create Stitch</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/posts" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title" value="{{ old('title') }}">
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
          <textarea class="form-control" name="synopsis" value="{{ old('synopsis') }}"></textarea>
      </div>

      <div class="form-group">
          <label for="body">Text</label>
          <textarea class="form-control" name="body" id="body" value="{{ old('body') }}"></textarea>
      </div>
<!-- Enter from URL part -->
      <div class="form-group mb-5">
          <p style="color:black;">Cover Image</p>
          <img name="img" class="img-fluid" id="cover" alt="cover" src="{{ url('/images/noimage.png') }}" style="max-width:120px;">
          <p id="photoPath" class="py-2 green">noimage.png</p>
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
                <div class="row p-3 moccha">
                    @foreach ($photos as $photo)
                      <div class="col-3">
                          <img class="thumbnail img-fluid" src="/gallery/{{ $photo->photo }}" alt="Photo">
                          <a href="#" class="pt-2" onclick="copyToInput('{{ $photo->photo }}')" >add to Cover</a><br>
                          <a href="#" onclick="insertPhoto('{{ $photo->photo }}')">add to Clipboard</a>
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

      <button class="btn btn-outline-secondary" type="submit" value="Submit" >Publish</button>
      <a href="{{ url('/admin') }}" class="btn btn-outline-dark">Cancel</a>

  </form>
</div>

<script>CKEDITOR.replace( 'body' );</script>

@endsection

@extends('admin.dashboard')

@section('title', 'Create Post')

@section('content')
  <script>
    tinymce.init({
      selector: '#body',
      entity_encoding : "raw"
    });
    </script>

  <h3 class="my-5">Create new Stitch</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/posts" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title" placeholder="title" value="{{ old('title') }}">
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
          <textarea class="form-control" name="synopsis" placeholder="a short description for indexing" value="{{ old('synopsis') }}"></textarea>
      </div>

      <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control" name="body" placeholder="the main text" id="body" value="{{ old('body') }}"></textarea>
      </div>

      <div class="form-group mb-5">
            <input type="file" name="cover_image" class="">
            <small class="form-text text-muted">Choose an image for your post. Max size 2048MB</small>
      </div>

      <button class="btn btn-secondary" type="submit" value="Submit" >Create Stitch!</button>
      <a href="{{ url('/posts') }}" class="btn btn-dark">Edit stitches</a>
      <a href="{{ url('/posts') }}" class="btn btn-light">View Stitches</a>

  </form>
</div>


@endsection

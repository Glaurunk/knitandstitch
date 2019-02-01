@extends('layouts.app')

@section('content')

  <h1 class="handwriting my-5">Edit Stitch</h1>

  <div class="my-5">

  <form class="form" action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

      <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title" value="{{ $post->title }}" placeholder="{{ old('title') }}">
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
          <textarea class="form-control" name="synopsis" placeholder="{{ old('synopsis') }}">{{ $post->synopsis }}</textarea>
      </div>

      <div class="form-group">
          <label for="body">Body</label>
          <textarea class="form-control "name="body" placeholder="{{ old('body') }}" id="article-ckeditor">{{ $post->body }}</textarea>
      </div>

      <img src="/storage/cover_images/{{ $post->cover_image }}" alt="cover image" style="width:200px;" class="mb-3">
      <div class="form-group">
            <input type="file" name="cover_image">
            <small class="form-text text-muted">Choose an new image for your post or leave blank to keep the existing one. Max size 2048MB</small>
      </div>
  <table>
     <td class="p-2">
       <button class="btn btn-secondary" type="submit" value="Submit" >Update Post</button>
     </td>
  </form>
      <form class="form" action="/posts/{{ $post->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
          <td class="p-2">
            <button type="submit" class="btn btn-danger">Delete Post</button>
          </td>
  </form>
  </table>
</div> <!-- here ends mt5 -->
<script src="{{ url('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection

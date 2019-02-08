@extends('admin.dashboard')

@section('title', 'Create Post')

@section('content')
  <script>
    tinymce.init({
      selector: '#body',
      entity_encoding : "raw"
    });
    </script>

  <h3 class="my-5">Δημιουργία Δημοσιεύματος</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/posts" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <div class="form-group">
          <label for="title">Τίτλος</label>
          <input class="form-control" type="text" name="title" placeholder="title" value="{{ old('title') }}">
      </div>

      <div class="form-group">
          <label for="title">Κατηγορία</label>
          <select class="form-control" id="category" name="category">
          <option>fashion</option>
          <option>self-care</option>
          <option>my house</option>
          <option>inspiration</option>
        </select>
      </div>

      <div class="form-group">
          <label for="synopsis">Σύνοψη</label>
          <textarea class="form-control" name="synopsis" placeholder="a short description for indexing" value="{{ old('synopsis') }}"></textarea>
      </div>

      <div class="form-group">
          <label for="body">Κείμενο</label>
          <textarea class="form-control" name="body" placeholder="the main text" id="body" value="{{ old('body') }}"></textarea>
      </div>

      <div class="form-group mb-5">
            <input type="#" name="cover_image" class="">
            <small class="form-text text-muted">Επιλέξτε μια εικόνα εξωφύλλου από τη βιβλιοθήκη</small>
      </div>

      <button class="btn btn-secondary" type="submit" value="Submit" >Δημιουργία Δημοσιεύματος!</button>
      <a href="{{ url('/posts') }}" class="btn btn-dark">Επεξεργασία Δημοσιευμάτων</a>
      <a href="{{ url('/posts') }}" class="btn btn-light">Πίσω στα Δημοσιεύματα</a>

  </form>
</div>


@endsection

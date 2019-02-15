@extends('layouts.dashboard')

@section('title', 'Create Post')

@section('content')
<script src=" {{ url( '../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>


  <h3 class="my-5">Ενημέρωση Δημοσιεύματος</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

      <div class="form-group">
          <label for="title">Τίτλος</label>
          <input class="form-control" type="text" name="title" placeholder="{{ $post->title }}" value="{{ $post->title }}">
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
          <textarea class="form-control" name="synopsis" placeholder="{{ $post->synopsis }}" value="{{ $post->synopsis }}"></textarea>
      </div>

      <div class="form-group">
          <label for="body">Κείμενο</label>
          <textarea class="form-control" name="body" placeholder="" id="body" value="{{ $post->body }}">{{ $post->body }}</textarea>
      </div>
<!-- Enter from URL part -->
      <div class="form-group mb-5">
          <p style="color:black;">Εικόνα Εξωφύλλου</p>
          <img name="img" class="img-fluid" id="cover" alt="cover" src="/storage/photos/{{ $post->cover_image }}" style="max-width:120px;">
          <p id="photoPath" class="py-2 green">{{ $post->cover_image }}</p>
          <button type="button" class="btn btn-outline-danger bt-3" data-toggle="modal" data-target="#inputForm">Προσθήκη εξωφύλλου ή αντιγραφή διεύθυνσης στο πρόχειρο</button><br>
          <input type="hidden" name="photo" value="" id="inputField" data-toggle="tooltip">
      </div>

<!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="inputForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fuxia" id="inputForm">Προσθήκη εξωφύλλου ή αντιγραφή διεύθυνσης στο πρόχειρο</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row p-3 light-grey">
                    @foreach ($photos as $photo)
                      <div class="col-3">
                          <img class="thumbnail img-fluid" src="/storage/photos/{{ $photo->photo }}" alt="Photo">
                          <a href="#" class="pt-2 fuxia" onclick="copyToInput('{{ $photo->photo }}')" >στο εξώφυλλο</a><br>
                          <a href="#" onclick="insertPhoto('{{ $photo->photo }}')">στο πρόχειρο</a>
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

      <button class="btn btn-outline-secondary" type="submit" value="Submit" >Ενημέρωση</button>
      <a href="{{ url('/admin/posts') }}" class="btn btn-outline-dark">Ακύρωση</a>

  </form>
</div>

<script>CKEDITOR.replace( 'body' );</script>

@endsection

@extends('layouts.dashboard')

@section('title', 'Create Knit')

@section('content')
<script src=" {{ url( '../vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>


  <h3 class="my-5">Edit Knit</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/knits/{{ $knit->id }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH')}}
      <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title" value="{{ $knit->name }}">
      </div>

      <div class="form-group hidden">
          <label for="title">Category</label>
          <select class="form-control" id="category" name="category">
          <option>none</option>
          <option>option 2</option>
          <option>option 3</option>
          <option>option 4</option>
        </select>
      </div>
{{-- Inactive field --}}
      <div class="form-group hidden">
        <input type="text" name="" value="">
      </div>

      <div class="form-group">
          <label for="body">Description</label>
          <textarea class="form-control" name="body" id="body" value="">{{ $knit->description }}</textarea>
      </div>

      <div class="form-group">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" value="{{ $knit->price }}">
      </div>

<!-- Enter from URL part for Main Picture -->
      @php
        $main = array_reverse(explode(',',$knit->photo))[0];
        $in_array = array_reverse(explode(',',$knit->photo));
        $in_gallery = array_shift($in_array);
      @endphp
      <div class="form-group">
          <p style="color:black;">Main Picture Preview</p>
          <img name="img" class="img-fluid" id="cover" alt="cover" src="/gallery/{{ $main }}" style="max-width:200px;">
          <p id="photoPath" class="py-2">{{ $main }}</p>
          <input type="hidden" name="photo" value="" id="inputField">
      </div>

<!-- Enter from URL part for Slides -->
      <div class="form-group mb-5">
          <p style="color:black;">Knit Image Gallery</p>
          <table id ="gallery" class="mb-5">
            <tr id="row">
              @foreach ($in_array as $photo)
                <td id="{{ $photo }}"><img class="mr-2 mb-3 pointer" id="{{ $photo}}" alt="slide" src="/gallery/{{ $photo }}" style="max-width:150px;" onclick="removeGallery(this.id)">
                  <br>
                  {{ $photo }}
                  <br>
                  <small>click on image to remove</small>
                </td>
              @endforeach
            </tr>
          </table>
          <button type="button" class="btn btn-outline-danger bt-3" data-toggle="modal" data-target="#inputForm">Add an image OR copy an image URL to the Clipboard</button><br>
          <input type="hidden" name="photo_array" value="" id="inputGallery">
      </div>

<!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="inputForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title fuxia" id="inputForm">Add an image OR copy an image URL to the Clipboard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row p-3 moccha">
                    @foreach ($photos as $photo)
                      <div class="col-3 mb-3">
                          <img class="thumbnail img-fluid mb-2" src="/gallery/{{ $photo->photo }}" alt="Photo">
                          <a href="#" class="mt-3" onclick="copyToInput('{{ $photo->photo }}')" >add as Main Image</a><br>
                          <a href="#" onclick="insertPhoto('{{ $photo->photo }}')">add to Clipboard</a><br>
                          <a href="#" onclick="addPhoto('{{ $photo->photo }}')">add to Gallery</a>
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
      <a href="{{ url('/admin/knits') }}" class="btn btn-outline-dark">Cancel</a>

  </form>
</div>

<script>CKEDITOR.replace( 'body' );</script>

@endsection

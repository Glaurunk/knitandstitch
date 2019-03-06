@extends('layouts.dashboard')

@section('title', 'Photos')

@section('content')
  <!-- MANAGE photoS CARD -->
  <div class="">
    <div class=" card-body moccha my-3">

        <table class="table table-hover table-responsive-md">
          <a href="{{ url('photos/create') }}" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#uploadPicture">Add New</a>
          <h3 class="text-center py-3">
            Images Catalogue</h3>
          <thead class="">
            <tr>
              <th scope="col">Preview</th>
              <th scope="col">Title</th>
              <th scope="col">Uploaded on</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

  @if(count($photos) > 0)

      @foreach ($photos as $photo)
            <tr>
              <th scope="row"><a href="/photos/{{ $photo->id }}"><img src="/gallery/{{ $photo->photo }}" alt="cover" style="max-width:120px;"></a></th>
              <td>{{ $photo->title }}</td>
              <td>{{ $photo->created_at }}</td>
              <td>
                <div class="row align-self-start">
                  <form class="" action="/photos/{{ $photo->id}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete')}}
                  <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Delete</button>
                  <a href="/photos/{{ $photo->id}}/edit" class="btn btn-sm btn-outline-secondary">Update Info</a>
                  </form>
                </div>
              </td>
            </tr>
      @endforeach
    @endif
          </tbody>
        </table>

        <p>{{ $photos->links() }}</p>
        <a href="{{ url('/admin')}}">back to dashboard</a>


    </div> <!-- here ends card block-->
  </div> <!-- here ends card -->

  @endsection

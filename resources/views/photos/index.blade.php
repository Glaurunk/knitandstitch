@extends('admin.dashboard')

@section('title', 'Photos')

@section('content')

<div class="container my-5">
      <h1>Συλλογή Εικόνων</h1>

    <div class="row p-3 light-grey">
        @foreach ($photos as $photo)
          <div class="col-md-2">
              <a href="/photos/{{ $photo->id }}"><img class="thumbnail img-fluid" src="/storage/photos/{{ $photo->photo }}" alt="Photo"></a>
              <p class="pt-2">{{ $photo->photo }}</p>
          </div>
        @endforeach
    </div>
</div>

@endsection

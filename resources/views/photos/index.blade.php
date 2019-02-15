@extends('layouts.dashboard')

@section('title', 'Photos')

@section('content')

<div class="container my-5">
      <h3 class="mb-5">Συλλογή Εικόνων</h3>

    <div class="row p-3 moccha">
        @foreach ($photos as $photo)
          <div class="col-md-2">
              <a href="/photos/{{ $photo->id }}"><img class="thumbnail img-fluid" src="/storage/photos/{{ $photo->photo }}" alt="Photo"></a>
              <p class="pt-2">{{ $photo->photo }}</p>
          </div>
        @endforeach
    </div>
</div>
<a href="{{ url('/admin')}}">πίσω στον πίνακα ελέγχου</a>

@endsection

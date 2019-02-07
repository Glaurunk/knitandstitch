@extends('admin.dashboard')

@section('title', 'Media Library')


@section('content')


  <div class="container py-5">
    <h1>Media Library</h1>

    @include('media.create')

    <h4>Images</h4>

    {{-- <div class="container">
      @foreach ($media as $medium)
        <div class="col-auto">
          <img src="" alt="">
        </div>{{ $medium->file_name }}
      @endforeach
    </div> --}}


  </div>

@endsection

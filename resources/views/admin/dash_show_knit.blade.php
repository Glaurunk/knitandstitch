@extends('layouts.dashboard')

@section('content')


  <div class="card fp-card mb-2 mt-5 p-5">
    <div class="card-block p-3">
      <h3 class="text-danger handwriting text-center">{{ $knit->name }}</h3>
      <h5 class="text-danger handwriting text-center  mt-3 mb-3">price: € {{ $knit->price }}</h5>
          <div  class="col text-center mb-2 moccha py-5">
<!-- The lightbox  -->
            <img id="lightbox" src="/gallery/{{ $knit->photo }} " alt="active" class="img-fluid">
          </div> <!-- here ends col -->
          <p class="text-center"><em>added on {{ $knit->created_at }}</em></p>
          <hr>
<!-- If we have only the cover, hide the div else iterate -->
          @php
            $others = explode(',', $knit->other);
            array_pop($others);
          @endphp
          @if (count($others) > 0)
            <div class="row justify-content-center">
              <div class="col px-2" style="max-width:150px;">
                <img src="/gallery/{{ $knit->photo }}" alt="covers" class="slides img-fluid rounded mb-2 pointer selected" id="{{ $knit->photo }}" onclick="preview(this.src, this.id );">
              </div>

              @foreach ($others as $other)
                  <div class="col px-2" style="max-width:150px;">
                    <img src="/gallery/{{ $other }}" alt="covers" class="slides img-fluid rounded mb-2 pointer
                    " id="{{ $other }}" onclick="preview(this.src, this.id );">
                  </div>
              @endforeach
            </div>
            <hr>
          @endif

          <h4 class="handwriting text-danger text-center pt-2 pb-3">Description</h4>
          <p>{!! $knit->description !!}</p>
          <div class="">

          </div>
          </div><!-- here ends card block-->
          <a href="{{ url('/admin/knits') }}" class=" float-right">back to knits</a>

      </div> <!-- here ends card -->

      @if (count($comments) > 0)
        <hr>
        <h4 class="handwriting text-danger text-center pt-2 pb-3">Comments</h4>



      @endif

    </div> <!-- here ends card block -->
  </div> <!-- here ends card -->


@endsection

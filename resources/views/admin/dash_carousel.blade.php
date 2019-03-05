@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<div class="container py-3 mb-5" id="top">
  <div class="row justify-content-center">
      <div class="col-md">
          <div class="card moccha">
              <div class="card-header grey text-center fs-20">Carousel Panel</div>
                <div class="card-body">

@include('layouts.carousel')

  <table class="table mb-5" id="carouselTable">
    <h3 class="pt-5">Carousel Slides</h3>
    <thead>
      <tr>
        <th scope="col-2">Preview</th>
        <th scope="col-auto">Filename</th>
        <th scope="col-auto">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if(count($in_carousels) > 0)

          @foreach ($in_carousels as $in_carousel)
                <tr>
                  <th scope="row"><img class="img-fluid" src="/gallery/{{ $in_carousel->photo }}" alt="Photo" style="max-width: 120px;"></th>
                  <td>{{ $in_carousel->photo }}</td>
                  <td>
                    <div class="row align-self-start">
                      <form class="" action="{{ url('/removefromcarousel')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="carousel_id" value="{{ $in_carousel->id }}">
                        <button class="btn btn-outline-danger btn-sm" type="submit" name="submit">Remove from Carousel</button>
                      </form>
                    </div>
                  </td>
                </tr>
          @endforeach
        @endif
    </tbody>
  </table>


<!-- Here start buttons -->
      <div class="card my-2 moccha">
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#insert">Add image to the Carousel</button>
      </div>


      <form class="form" action="#" method="post">
      {{ csrf_field() }}
      </form>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fuxia" id="inputForm">Select a photo for the Carousel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-3">
          @if(count($not_in_carousels) > 0)

            @foreach ($not_in_carousels as $not_in_carousel)
              <div class="col-3">
                  <img class="thumbnail img-fluid" src="/gallery/{{ $not_in_carousel->photo }}" alt="Photo">
                  <form class="" action="{{ url('/addtocarousel')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="not_carousel_id" value="{{ $not_in_carousel->id }}">
                    <button class="btn fuxia"type="submit" name="submit" onclick="addToCarousel()">Add to Carousel</button>
                  </form>
              </div>
            @endforeach
          @endif

        </div> <!-- here ends row -->
      </div> <!-- here ends modal-body -->
      </div> <!-- here ends modal-content -->
    </div> <!-- here ends modal-dialogue -->
  </div> <!-- here ends modal -->

  <a href="{{ url('/admin')}}">back to dashboard</a>


<!-- Closing tags -->

                </div> <!-- here ends Card body -->
            </div> <!-- here ends Card -->
        </div> <!-- here ends col -->
    </div> <!-- here ends row -->
</div> <!-- here ends Card container -->


@endsection

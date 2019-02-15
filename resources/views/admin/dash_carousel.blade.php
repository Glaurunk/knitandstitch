@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<div class="container py-3 mb-5" id="top">
  <div class="row justify-content-center">
      <div class="col-md">
          <div class="card indigo">
              <div class="card-header grey text-center fs-20" >Ρύθμιση Carousel</div>
                <div class="card-body">

@include('layouts.carousel')

  <table class="table mb-5" id="carouselTable">
    <h3 class="pt-5">Φωτογραφίες στο Carousel</h3>
    <thead>
      <tr>
        <th scope="col-2">Εικόνα</th>
        <th scope="col-auto">Όνομα Αρχείου</th>
        <th scope="col-auto">Ενέργειες</th>
      </tr>
    </thead>
    <tbody>
      @if(count($in_carousels) > 0)

          @foreach ($in_carousels as $in_carousel)
                <tr>
                  <th scope="row"><img class="img-fluid" src="/storage/photos/{{ $in_carousel->photo }}" alt="Photo" style="max-width: 120px;"></th>
                  <td>{{ $in_carousel->photo }}</td>
                  <td>
                    <div class="row align-self-start">
                      <form class="" action="{{ url('/removefromcarousel')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="carousel_id" value="{{ $in_carousel->id }}">
                        <button class="btn btn-outline-danger btn-sm" type="submit" name="submit">Αφαίρεση από το Carousel</button>
                      </form>
                    </div>
                  </td>
                </tr>
          @endforeach
        @endif
    </tbody>
  </table>


<!-- Here start buttons -->
      <div class="card my-2">
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#insert">Προσθήκη εικόνας στο Carousel</button>
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
                  <img class="thumbnail img-fluid" src="/storage/photos/{{ $not_in_carousel->photo }}" alt="Photo">
                  <form class="" action="{{ url('/addtocarousel')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="not_carousel_id" value="{{ $not_in_carousel->id }}">
                    <button class="btn fuxia"type="submit" name="submit" onclick="addToCarousel()">Προσθήκη στο Carousel</button>
                  </form>
              </div>
            @endforeach
          @endif

        </div> <!-- here ends row -->
      </div> <!-- here ends modal-body -->
      </div> <!-- here ends modal-content -->
    </div> <!-- here ends modal-dialogue -->
  </div> <!-- here ends modal -->

  <a href="{{ url('/admin')}}">πίσω στον πίνακα ελέγχου</a>


<!-- Closing tags -->

                </div> <!-- here ends Card body -->
            </div> <!-- here ends Card -->
        </div> <!-- here ends col -->
    </div> <!-- here ends row -->
</div> <!-- here ends Card container -->


@endsection

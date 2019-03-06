<div class="row mt-4 pb-5 justify-content-center">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @php
            $i=0;
          @endphp
          @foreach ($in_carousels as $list_item)
            @if ($i == 0)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active"></li>
              @else
              <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class=""></li>
            @endif
            @php
              $i++;
            @endphp
          @endforeach
        </ol>

      <div class="carousel-inner">
        @php
          $j=0;
        @endphp
        @foreach ($in_carousels as $carousel_item)
          @if ($j == 0)
            <div class="carousel-item active">
              <img class="d-block w-100" src="/gallery/{{ $carousel_item->photo }}?auto=yes&bg=777&fg=555" alt="slide">
            </div>
          @else
            <div class="carousel-item">
            <img class="d-block w-100" src="/gallery/{{ $carousel_item->photo }}?auto=yes&bg=777&fg=555" alt="slide">
          </div>
            @endif
            @php
              $j++;
            @endphp
        @endforeach

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> <!-- here ends carousel -->
  </div> <!-- here ends row slider -->
<!-- Here endscarousel -->

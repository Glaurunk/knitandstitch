@extends('layouts.app')

@section('content')

  <h1 class="text-center handwriting py-5" id="top">My Knits</h1>

  @if(count($knits) > 0)
        @foreach ($knits as $knit)
          <div class="row justify-content-center mb-3">
            <div class="mb-2 col-auto crem p-5 br-12">
                  <h4 class="handwriting"><a href="knits/{{ $knit->id }}">{{ $knit->name }}</a></h4>
                        <a href="knits/{{ $knit->id }}"><img src="/gallery/{{ $knit->photo }}" alt="image" class="img-fluid rounded py-2"></a>
                        <h6 class="pointer" data-toggle="tooltip" title="This site does not offer online purchases. If you are interested in my creations please contact me!">price: €{{ $knit->price }} </h6>
                        @if (count($knit->comments) > 0)
                          @if (count($knit->comments) == 1)
                            <p class="text-right"><em>{{ count($knit->comments) }} comment</em></p>
                          @else
                            <p class="text-right"><em>{{ count($knit->comments) }} comments</em></p>
                          @endif
                        @endif
            </div> <!-- here ends col -->
        </div> <!-- here ends row -->
        @endforeach
  @else

    <p>No Knits Found!</p>

  @endif

  <p>{{ $knits->links() }}</p>
  <a href="#top">back to top</a>
@endsection

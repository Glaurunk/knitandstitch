@extends('layouts.app')

@section('content')

  <h1 class="handwriting py-5" id="top">My Knits</h1>

  @if(count($knits) > 0)

        @foreach ($knits as $knit)
          <div class="card fp-card mb-2">
            <div class="card-block p-3">
              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <p>{{ $knit->id }}</p>

                  {{ $knit->photo }}
                      <img src="/gallery/{{ $knit->photo }}" alt="image" class="img-fluid rounded">
                </div>
                <div class="col-md-8 col-sm-8">
                      <h4 class="handwriting"><a href="knits/{{ $knit->id }}">{{ $knit->name }}</a></h4>
                      <h6 class="font-italic pt-2 pb-3">Category: <a href="/{{ $knit->category }}">{{ $knit->category }}</a> | {{ $knit->created_at->day }}/{{ $knit->created_at->month }}/{{ $knit->created_at->year }}</h6>
                      <p>{{ $knit->synopsis }}</p>
                </div> <!-- here ends col -->
              </div> <!-- here ends row -->
            </div> <!-- here ends card-block -->
          </div> <!-- here ends card -->


        @endforeach
  @else

    <p>No Knits Found!</p>

  @endif

  <p>{{ $knits->links() }}</p>
  <a href="#top">back to top</a>
@endsection

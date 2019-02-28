@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<!-- MANAGE knitS CARD -->
<div class="">
  <div class=" card-body moccha my-3">

      <table class="table table-hover">
        <a href="{{ url('knits/create') }}" class="btn btn-outline-dark btn-sm">Add New</a>
        <h3 class="text-center py-3">
          Knits Panel</h3>
        <thead class="">
          <tr>
            <th scope="col">Preview</th>
            <th scope="col">Name</th>
            {{-- <th scope="col">Category</th> --}}
            <th scope="col">Price</th>
            <th scope="col">Comments</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

@if(count($knits) > 0)

    @foreach ($knits as $knit)
<!-- transform the string to an array in order to get the needed item for display. rember, due to comma separation the preview image is LAST in the array-->
      @php
      $photoarray = explode(',',$knit->photo);
      @endphp

          <tr>
            <th scope="row"><a href="knits/{{ $knit->id }}"><img src="/gallery/{{ end($photoarray) }}" alt="cover" style="max-width:150px;"></a></th>
            <td>{{ $knit->name }}</td>
            {{-- <td>{{ $knit->category }}</td> --}}
            <td>€ {{ $knit->price }}</td>
            <td>{{ count( $knit->comments )}}</td>
            <td>
              <div class="row align-self-start">
                <form class="" action="/knits/{{ $knit->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete')}}
                <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Delete</button>
                <a href="/knits/{{ $knit->id}}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                </form>
              </div>
            </td>
          </tr>
    @endforeach
  @endif
        </tbody>
      </table>

      <p>{{ $knits->links() }}</p>
      <a href="{{ url('/admin')}}">back to dashboard</a>


  </div> <!-- here ends card block-->
</div> <!-- here ends card -->

@endsection

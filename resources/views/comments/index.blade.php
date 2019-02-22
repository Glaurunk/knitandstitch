@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<!-- Comments by USER -->
  <div class="">
    <div class=" card-body moccha my-3">

        <table class="table table-hover">
          <h3 class="text-center py-3">
            Posts With Comments</h3>
          <thead class="">
            <tr>
              <th scope="col">Stitch Title</th>
              <th scope="col">Comments</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

@foreach ($posts as $post)

  <tr>
    <th scope="row"><a href="posts/{{ $post->id }}/edit">{{ $post->title }}</a></th>
    <td>{{ count( $post->comments) }} </td>
    <td></td>
    <td>
      <div class="row align-self-start">
        {{-- <form class="" action="/comments/{{ $comment->id}}" method="comment">
        {{ csrf_field() }}
        {{ method_field('delete')}}
        <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Delete</button>
        <a href="/comments/{{ $comment->id}}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
        </form> --}}
      </div>
    </td>
  </tr>

@endforeach
</tbody>
</table>
  {{-- @if(count($comments) > 0)

      @foreach ($comments as $comment)
            <tr>
              <th scope="row">{{ $comment->post->title }}</th>
              <td>{{ $comment->title }}</td>
              <td>{{ $comment->created_at }}</td>
              <td>
                <div class="row align-self-start">
                  <form class="" action="/comments/{{ $comment->id}}" method="comment">
                  {{ csrf_field() }}
                  {{ method_field('delete')}}
                  <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Delete</button>
                  <a href="/comments/{{ $comment->id}}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                  </form>
                </div>
              </td>
            </tr>
      @endforeach
    @endif
         --}}

        {{-- <p>{{ $comments->links() }}</p> --}}
        <a href="{{ url('/admin')}}">back to dashboard</a>


    </div> <!-- here ends card block-->
  </div> <!-- here ends card -->
@endsection

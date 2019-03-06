@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<!-- MANAGE postS CARD -->
<div class="">
  <div class=" card-body moccha my-3">

      <table class="table table-hover table-responsive-md">
        <a href="{{ url('posts/create') }}" class="btn btn-outline-dark btn-sm">Add New</a>
        <h3 class="text-center py-3">
          Stitces Panel</h3>
        <thead class="">
          <tr>
            <th scope="col">Cover Image</th>
            <th scope="col">Title</th>
            <th scope="col">Published</th>
            <th scope="col">Comments</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

@if(count($posts) > 0)

    @foreach ($posts as $post)
          <tr>
            <th scope="row"><a href="/posts/{{ $post->id }}"><img src="/gallery/{{ $post->cover_image }}" alt="cover" style="max-width:120px;"></a></th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ count( $post->comments )}}</td>
            <td>
              <div class="row align-self-start">
                <form class="" action="/posts/{{ $post->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete')}}
                <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Delete</button>
                <a href="/posts/{{ $post->id}}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                </form>
              </div>
            </td>
          </tr>
    @endforeach
  @endif
        </tbody>
      </table>

      <p>{{ $posts->links() }}</p>
      <a href="{{ url('/admin')}}">back to dashboard</a>


  </div> <!-- here ends card block-->
</div> <!-- here ends card -->

@endsection

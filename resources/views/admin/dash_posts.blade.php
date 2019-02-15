@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<!-- MANAGE postS CARD -->
<div class="">
  <div class=" card-body moccha my-3">

      <table class="table table-hover">
        <a href="{{ url('posts/create') }}" class="btn btn-outline-dark btn-sm">Προσθήκη νέας</a>
        <h3 class="text-center py-3">
          Πίνακας Δημοσιεύσεων</h3>
        <thead class="">
          <tr>
            <th scope="col">Εικόνα Εξωφύλλου</th>
            <th scope="col">Τίτλος</th>
            <th scope="col">Ημερομηνία</th>
            <th scope="col">Ενέργειες</th>
          </tr>
        </thead>
        <tbody>

@if(count($posts) > 0)

    @foreach ($posts as $post)
          <tr>
            <th scope="row"><a href="/posts/{{ $post->id }}"><img src="/storage/photos/{{ $post->cover_image }}" alt="cover" style="max-width:120px;"></a></th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
              <div class="row align-self-start">
                <form class="" action="/posts/{{ $post->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete')}}
                <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Διαγραφή</button>
                <a href="/posts/{{ $post->id}}/edit" class="btn btn-sm btn-outline-secondary">Επεξεργασία</a>
                </form>
              </div>
            </td>
          </tr>
    @endforeach
  @endif
        </tbody>
      </table>

      <p>{{ $posts->links() }}</p>
      <a href="{{ url('/admin')}}">πίσω στον πίνακα ελέγχου</a>


  </div> <!-- here ends card block-->
</div> <!-- here ends card -->

@endsection

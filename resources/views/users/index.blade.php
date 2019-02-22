@extends('layouts.dashboard')

@section('title', 'users')

@section('content')
  <!-- MANAGE userS CARD -->
  <div class="">
    <div class=" card-body moccha my-3">

        <table class="table table-hover">
          <h3 class="text-center py-3">
            Users Catalogue</h3>
          <thead class="">
            <tr>
              <th scope="col">User ID</th>
              <th scope="col">User Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subscriber</th>
              <th scope="col">Comments</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

      @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
              <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
              <td>
                @if ($user->has_subscription == 0)
                  NO
                @else
                  YES
                @endif
              </td>
              <td>{{ count($user->comments)}}</td>
              <td>
                <div class="row align-self-start">
                  <form class="" action="/users/{{ $user->id}}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('delete')}}
                  <button type="submit" name="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete()">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
      @endforeach
          </tbody>
        </table>

        <p>{{ $users->links() }}</p>
        <a href="{{ url('/admin')}}">back to dashboard</a>


    </div> <!-- here ends card block-->
  </div> <!-- here ends card -->

  @endsection

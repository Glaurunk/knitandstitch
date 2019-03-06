@extends('layouts.dashboard')

@section('title', 'users')

@section('content')
  <!-- MANAGE userS CARD -->
  <div class="">
    <div class=" card-body moccha my-3">

        <table class="table table-hover table-responsive-md">
          <h3 class="text-center py-3">
            Users Catalogue</h3>
          <thead class="">
            <tr>
              <th scope="col" class="text-center">User ID</th>
              <th scope="col" class="text-center">User Name</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Verified</th>
              <th scope="col" class="text-center">Subscriber</th>
              <th scope="col" class="text-center">Comments</th>
              <th scope="col" class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>

      @foreach ($users as $user)
            <tr>
              <th scope="row" class="text-center">{{ $user->id }}</th>
              <td class="text-center"><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
              <td class="text-center"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
              <td class="text-center">
                @if ($user->email_verified_at == '')
                  NO
                @else
                  YES
                @endif
              </td>
              <td class="text-center">
                @if ($user->has_subscription == 0)
                  NO
                @else
                  YES
                @endif
              </td>
              <td class="text-center">{{ count($user->comments)}}</td>
              <td class="row justify-content-center">
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

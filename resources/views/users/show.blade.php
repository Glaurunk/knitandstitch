@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')

<div class="container my-5">
  <div class="card moccha">
    <div class="card-header">
      @if (Auth::user()->id == $user->id)
        <p>{{ $user->name }} welcome to your user panel!</p>
        <small>From this control panel you can change profile information, subscribe/unsubscribe to our Newsletter or even delete your profile along with all comments from our database.
        </small>
        @else
          <h3>User #{{ $user->id }} profile information</h3>
      @endif

    </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>User Name: <strong>{{ $user->name }}</strong></td>
              <td>
                @if ($user->id == Auth::user()->id)
                <button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#userModal">Change</button>
              @endif
              </td>
            </tr>
            <tr>
              <td>Email: <strong>
                @if ($user->email_verified_at != '' and Auth::user()->role == 'admin')
                <a href="mailto:{{ $user->email }}">
                @endif
                  {{ $user->email }}</a></strong>
                @if ($user->email_verified_at == '')
                  <em><span class="text-red">Pending verification</span></em>
                  @else
                  <em><span class="text-red">Verified!</span></em>
                @endif
              </td>
              <td>
                @if ($user->email_verified_at == '' and Auth::user()->id == $user->id)
                  <a href="/email/verify" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip" title="Verify your email in order to post comments and recieve our newsletter!">Verify Email</a>
                @else
                  <strong class="text-red"></strong>
                @endif
              </td>
            </tr>
            <tr>
              <td>Member since: <strong>{{ $user->created_at }}</strong></td>
              <td></td>
            </tr>
            <tr>
              <td>User previlages: <strong>{{ $user->role }}</strong></td>
              <td></td>
            </tr>
            <tr>
              <td>Comments: <strong>{{ count($user->comments) }}</strong></td>
              <td></td>
            </tr>
            <tr>
              <td>@if ($user->has_subscription)
                Subscriber: <strong>YES</strong>
                @else
                Subscriber: <strong>NO</strong>
              @endif</td>
              <td>
                @if ($user->id == Auth::user()->id)
                  <form class="form" action="/subscribe" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary ">Toggle Subscription</button>
                  </form>
                @endif
              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer">

          @include('layouts.confirmDelete')

          <form class="form" action="/users/{{ $user->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-outline-danger float-right" onclick="confirmDelete()"data-toggle="tooltip" data-placement="top" title="This action will also remove all user comments from all posts!">Delete Profile</button>
          </form>
          @if (Auth::user()->role == 'admin')
          <a href="{{ url('/users')}}">back to users</a>
          @endif
        </div>
    </div>
</div>

<!-- Edit User Name Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Edit User Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="commentsArea">User Name</label>
        <form class="form" action="/users/{{ $user->id }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PATCH')}}
          <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}"></input>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-danger">Submit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
      </form>
    </div> <!-- Here ends modal footer -->
  </div> <!-- Here ends modal content -->
</div> <!-- Here ends modal dialogue -->
</div> <!-- Here ends modal -->
@endsection

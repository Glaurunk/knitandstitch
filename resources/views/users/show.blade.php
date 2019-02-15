@extends('layouts.dashboard')

@section('title', 'User Profile')

@section('content')

<div class="container my-5">
  <div class="card">
    <div class="card-header">
       <p>{{ $user->name }} καλώς όρισες στον Πίνακα Ελέγχου!</p>
       <small>Από τον πίνακα αυτόν μπορείς να αλλάξεις τα στοιχεία σου, να εγγραφείς/απεγγραφείς στο newsletter μας ή να καταργήσεις την εγγραφή σου από την ιστοσελίδα μας (μην το κάνεις, είναι μια τρέλα!)</small>
    </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>Όνομα μέλους: <strong>{{ $user->name }}</strong></td>
              <td><button class="btn btn-secondary btn-sm">Αλλαγή</button></td>
            </tr>
            <tr>
              <td>Email: <strong>{{ $user->email }}</strong></td>
              <td></td>
            </tr>
            <tr>
              <td>Μέλος από: <strong>{{ $user->created_at }}</strong></td>
              <td></td>
            </tr>
            <tr>
              <td>Κατηγορία χρήστη: <strong>{{ $user->role }}</strong></td>
              <td></td>
            </tr>
            <tr>
              <td>@if ($user->has_subscription)
                <p>Συνδρομητής: <strong>NAI</strong></p>
                @else
                <p>Συνδρομητής: <strong>OXI</strong></p>
              @endif</td>
              <td><button class="btn btn-secondary btn-sm">Αλλαγή</button></td>
            </tr>
          </table>
        </div>
        <div class="card-footer">

          @include('layouts.confirmDelete')

          <form class="form" action="/users/{{ $user->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-danger float-right" onclick="confirmDelete()">Απεγγραφή από την Ιστοσελίδα</button>
          </form>
        </div>
    </div>
</div>

@endsection

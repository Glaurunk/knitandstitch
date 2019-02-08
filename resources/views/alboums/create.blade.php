@extends('admin.dashboard')

@section('title', 'Create Alboum')

@section('content')


  <h3 class="my-5">Δημιουργία Άλμπουμ</h3>

  <div class="my-5 px-5">

  <form class="form pb-5" action="/alboums" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

      <div class="form-group">
          <label for="title">Τίτλος</label>
          <input class="form-control" type="text" name="name" placeholder="Τίτλος άλμπουμ" value="{{ old('name') }}">
      </div>

      <div class="form-group">
          <label for="synopsis">Περιγραφή</label>
          <textarea class="form-control" name="description" placeholder="Πληροφορίες" value="{{ old('description') }}"></textarea>
      </div>

      <div class="form-group mb-5">
            <input type="#" name="cover" class="">
            <small class="form-text text-muted">Επιλέξτε μία εικόνα για το εξώφυλλο του άλμπουμ σας!</small>
      </div>

      <button class="btn btn-secondary" type="submit" value="Submit" >Δημιουργία Άλμπουμ!</button>
      <a href="#" class="btn btn-dark">Επεξεργασία Άλμπουμ</a>
      <a href="{{ url('/alboums') }}" class="btn btn-light">Πίσω στις Εικόνες</a>

  </form>
</div>


@endsection

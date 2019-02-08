@extends('admin.dashboard')

@section('title', 'Photos')

@section('content')

<div class="container my-5">
    @php
      $size = $photo->size;
      $MB = sprintf("%4.2f MB", $size/1048576);
    @endphp

  <div class="row justify-content-center my-5">
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">{{ $photo->photo }}</div>
                <div class="card-body">
                  <img class="card-img-top" src="/storage/photos/{{ $photo->photo }}" alt="image">
                  <h5 class="py-3">Tίτλος: {{ $photo->title }}</h5>
                  <p>Σύντομη Περιγραφή: <em>{{ $photo->description }}</em></p>
                  <p>Μέγεθος: {{ $MB }}</p>
                  <p>Διαστάσεις: {{ $photo->dimensions }}</p> <p><small>Μεταφορτώθηκε: {{ $photo->created_at }}</small>
                  <br><small>Tελευταία ενημέρωση: {{ $photo->updated_at }}</small></p>
                </div> <!-- here ends card body -->
          </div> <!-- here ends card -->
      </div> <!-- here ends column -->

      <div class="col-md-6">
          <div class="card">
              <div class="card-header">Επεξεργασία στοιχείων</div>
                <div class="card-body">
                  <form class="form" action="/photos/{{ $photo->id }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH')}}

                      <div class="form-group">
                          <label for="title">Νέος Τίτλος</label>
                          <input class="form-control" type="text" name="title" placeholder="{{ $photo->title }}" value="{{ old('title') }}">
                      </div>

                      <div class="form-group">
                          <label for="description">Νέα Σύντομη Περιγραφή</label>
                          <textarea class="form-control" name="description" placeholder="{{ $photo->description}}" value="{{ old('description') }}"></textarea>
                      </div>

                  </div> <!-- here ends card body -->

                  <div class="modal-footer">
                      <table>
                        <td>
                          <button class="btn btn-secondary" type="submit" value="Submit">Ενημέρωση</button>
                          </form>
                        </td>

                    @include('layouts.confirmDelete')

                        <form class="form" action="/photos/{{ $photo->id }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('delete') }}
                          <td>
                            <button type="submit" class="btn btn-danger" onclick="confirmDelete()">Διαγραφή</button>
                          </td>
                          <td>
                            <a href="{{ url('/photos')}}" class="btn btn-dark my-2">Πίσω στη Συλλογή</a>
                          </td>
                        </form>
                      </table>
                    </div>

                </div> <!-- here ends card body -->
          </div> <!-- here ends card -->
      </div> <!-- here ends column -->

    </div> <!-- here ends row -->
</div> <!-- here ends container -->

@endsection

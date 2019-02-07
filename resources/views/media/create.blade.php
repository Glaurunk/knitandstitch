{{-- Upload New File Form --}}

    <div class="card">
      <div class="card-header">Upload new Image
        <div class="card-body">
            <form class="" action="{{ route('media.store')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Βιβλιοθήκη Πολυμέσων</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="filename">
                  <label class="custom-file-label" for="inputGroupFile01">Eπιλέξτε αρχείο</label>
                </div>
              </div>

                <input type="submit" name="upload" value="Upload" class="btn btn-secondary">
            </form>
        </div>
      </div>
    </div>

<!-- Upload New Photo Modal -->
<div class="modal fade" id="uploadPicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadPicture">Upload New Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form pb-5" action="/photos" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" placeholder="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Short Description</label>
                <textarea class="form-control" name="description" placeholder="a short description for indexing" value="{{ old('synopsis') }}"></textarea>
            </div>

            <div class="form-group mb-5">
                  <input type="file" name="photo">
                  <small class="form-text text-muted">Choose an image from yoyr computer. Maximum size: 2ΜΒ</small>
            </div> <!-- here ends file input -->
      </div> <!-- here ends modal body -->

        <div class="modal-footer">
          <button class="btn btn-outline-secondary" type="submit" value="Submit" >Upload</button>
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal" aria-label="Close">Cancel</button>
          </form>
      </div> <!-- here ends modal footer -->
    </div> <!-- here ends modal content -->
  </div> <!-- here ends modal dialogue -->
</div> <!-- here ends modal -->

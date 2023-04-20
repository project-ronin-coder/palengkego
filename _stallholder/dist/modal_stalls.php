<!-- EDIT STALL -->
<div class="modal fade" id="modalEditStall" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-main">
      <!-- HEADER -->
      <div class="modal-header bg-main">
        <h5 class="modal-title text-white">Edit Stall</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditStallDetails" action="includes/stalls_crud.php" method="POST" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="stall-id" id="stall-id" name="stall_id" hidden>
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="font-weight-bold mb-2">Stall Details</h4>
          </div>
          <!-- STALL NAME -->
          <label for="editStallName">Stall Name</label>
          <div class="input-group mb-2">
            <input type="text" class="form-control" id="editStallName" name="stall_name" placeholder="Stall Name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fa fa-store"></span>
              </div>
            </div>
          </div>
          <hr class="m-0">
          <div class="d-flex flex-column">
            <label for="editStallName" class="col-form-label">Stall Photo</label>
            <img class="img-thumbnail mx-auto d-block mb-2 " id="StallPhoto" src="" alt="a picture of your stall photo">
            <button type="button" class="btn btn-info text-center" data-toggle="modal" data-target="#modalStallPhoto" data-dismiss="modal">
              Update stall photo
            </button>
          </div>
          <!-- STALL INPUT -->
        </form>
        <hr>
        <div class="mb-2">
          <h5><strong>Vendors/Helpers List</strong></h5>
          <ul class="list-group vendor-helper-list">

          </ul>
        </div>
        <p class="text-primary text-bold m-0">
          <i class="fa fa-edit pr-1"></i>
          Proceeding with this operation will change this stall's details.
        </p>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer border">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formEditStallDetails" class="btn btn-primary" name="edit_stall">
          <i class="fa fa-check pr-1"></i>
          Save</button>
      </div>
    </div>
  </div>
</div>

<!-- STALL PHOTO -->
<div class="modal fade" id="modalStallPhoto" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-2 border-info">
      <!-- HEADER -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Update Stall Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formUpdateStallPhoto" method="POST" action="includes/stalls_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <div class="d-flex flex-column">
            <p class="text-center pb-2 mb-0">Are you sure you want to change your stall photo?
            </p>
            <img class="img-thumbnail mx-auto d-block mb-2 " id="newStallPhoto" src="../src/stall_photo/default_stall.png" onclick="triggerClick()" style="width: 100%; flex-shrink: 0;">
            <!-- ID -->
            <input type="hidden" class="stall-id" id="stall-id" name="stall_id" hidden>
          </div>
          <!-- STALLPHOTO INPUT -->
          <div class="input-group">
            <div class="custom-file d-flex">
              <input type="file" class="form-control custom-file-input stall-photo" id="inputStallPhoto" name="stall_photo" onchange="displayImage(this)" required>
              <label class="custom-file-label stall-photo-label" for="stall-photo">Choose a new stall photo</label>
            </div>
          </div>
          <p class="text-info text-bold m-0">
            <i class="fa fa-info pr-1"></i>
            Proceeding with this operation will change this stall's photo.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default mr-auto" data-toggle="modal" data-target="#modalEditStall" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Back
        </button>
        <button type="submit" form="formUpdateStallPhoto" class="btn btn-info " name="update_stall_photo"><i class="fa fa-check-square-o"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>
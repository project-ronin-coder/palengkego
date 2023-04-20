<!-- EDIT STALL-->
<div class="modal fade" id="editStall">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title">Edit Stall</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form id="formEditStall" method="POST" action="includes/stallsUnassigned_crud.php" enctype="multipart/form-data">
          <!-- STALL ID -->
          <input type="hidden" class="stall-id" id="stallId" name="stall_id" hidden>
          <h4 class="font-weight-bold mb-2">Stall Details</h4>
          <!-- STALL NAME -->
          <div class="input-group mb-2">
            <label for="editStallName" class="col-sm-4 col-form-label">Stall Name</label>
            <input type="text" class="form-control-sm col-sm-8 align-middle" id="editStallName" name="stall_name" placeholder="Stall Name" required>
          </div>
        </form>
        <hr class="m-0">
        <!-- STALL OWNER NAME -->
        <div class="input-group">
          <label for="fullName" class="col-sm-4 col-form-label text-left">Stallholder:</label>
          <div class="col-sm-8 text-left d-flex align-items-center">
            <span class="stallholder" id="editStallholder"></span>
          </div>
        </div>
        <!-- ADDRESS -->
        <div class="input-group">
          <label for="address" class="col-sm-4 col-form-label text-left">Address:</label>
          <div class="col-sm-8 text-left d-flex align-items-center">
            <span class="address d-inline-block text-truncate" id="editAddress" style="max-width: 20rem;"></span>
          </div>
        </div>
        <!-- CONTACT NUMBER -->
        <div class="input-group">
          <label for="contactNumber" class="col-sm-4 col-form-label text-left">Contact Number:</label>
          <div class="col-sm-8 text-left d-flex align-items-center">
            <span class="contact-number" id="editContactNumber"></span>
          </div>
        </div>
        <!-- Email -->
        <div class="input-group">
          <label for="email" class="col-sm-4 col-form-label text-left">Email:</label>
          <div class="col-sm-8 text-left d-flex align-items-center">
            <span class="email" id="editEmail"></span>
          </div>
        </div>
        <form id="formRedirectToStallholder" action="includes/stallsUnassigned_crud.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <!-- STALL ID -->
          <input type="hidden" class="stall-holder-name" id="stallholderName" name="stall_holder_name">
        </form>
        <button type="submit" form="formRedirectToStallholder" class="btn btn-success  d-block ml-auto" name="redirect">
          <span class="fa fa-plus pr-2"></span>
          Edit Stallholder
        </button>
        <hr>
        <h4 class="font-weight-bold mb-2">Vendors/Helpers List</h4>
        <ul class="list-group mb-2">
          <li class="list-group-item m-0">No Vendor/Helper Found</li>
        </ul>
        <p class="text-success text-bold ">
          <i class="fa fa-edit pr-1"></i>
          Proceeding with this operation will edit this stall's details.
        </p>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formEditStall" class="btn btn-success " name="edit_stall">
          <i class="fa fa-save"></i>
          Update
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE -->
<div class="modal fade" id="deleteStall">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title">Delete Stall</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formDeleteStall" method="POST" action="includes/stallsUnassigned_crud.php" enctype="multipart/form-data">
          <!-- STALL ID -->
          <input type="hidden" class="stall-id" name="stall_id" hidden>
          <div class="text-center">
            <p>
              Are you sure you want to delete this stall?
            </p>
            <!-- FULL NAME -->
            <h2 class="bold stall-name"></h2>
            <p>Owned by: <span class="text-bold stallholder"></span></p>
            <p class="text-danger text-bold">
              <i class="fa fa-exclamation-triangle"></i>
              Proceeding with this operation will erase the contents of this stall including its products.
            </p>
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formDeleteStall" class="btn btn-danger " name="delete_stall"><i class="fa fa-trash"></i>
          Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- STALL PHOTO -->
<div class="modal fade" id="photoStall">
  <div class="modal-dialog modal-dialog-scrollable">
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
        <form class="form-horizontal" id="editStallPhoto" method="POST" action="includes/stallsUnassigned_crud.php" enctype="multipart/form-data">
          <!-- STALL PHOTO -->
          <div class="d-flex flex-column">
            <p class="text-center pb-2 mb-0">Change stall photo for <span class="stallholder"></span></p>
            <!-- NAME -->
            <h4 class="pb-2 mb-0 text-center"><b><span class="stall-name" id="stall-name"></span></b></h4>
            <img class="img-thumbnail mx-auto d-block mb-2 " id="newStallPhoto" src="" onclick="triggerClick()" style="width: 100%; flex-shrink: 0;">
            <!-- ID -->
            <input type="hidden" class="stall-id" id="stall-id" name="stall_id" hidden>
          </div>
          <!-- STALL INPUT -->
          <div class="input-group">
            <div class="custom-file d-flex">
              <input type="file" class="form-control custom-file-input stall-photo" id="stall-photo" name="stall_photo" onchange="displayImage(this)" required>
              <label class="custom-file-label" for="stall-photo">Choose a profile picture</label>
            </div>
          </div>
          <p class="text-info text-bold m-0">
            <i class="fa fa-info pr-1"></i>
            Proceeding with this operation will change this stalls's photo.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="editStallPhoto" class="btn btn-info " name="upload_stall_photo"><i class="fa fa-check-square-o"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>

<!-- VIEW PRODUCTS -->
<div class="modal fade" id="viewProducts">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-info">
      <!-- HEADER -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Product List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formViewProducts" action="includes/stallsUnassigned_crud.php" method="get" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="stall-id" id="stall-id" name="id" hidden>
          <!-- STALL PHOTO -->
          <img src="" class="img-thumbnail mb-2" id="stallPhoto" alt="">
          <!-- STALL NAME -->
          <p class="m-0"><strong class="mr-2">Stall Name:</strong><span id="viewStallName"></span></p>
          <!-- STALLHOLDER NAME -->
          <p class="m-0"><strong class="mr-2">Stallholder:</strong><span id="viewStallholder"></span></p>
          <hr>
          <h5><strong>Product List</strong></h5>
          <ul class="list-group product-group mb-2">
            <li class="list-group-item m-0">No Products Found</li>
          </ul>
          <p class="text-info text-bold m-0">
            <i class="fa fa-info pr-1"></i>
            Proceeding with this operation will redirect you to Products.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer border">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formViewProducts" class="btn btn-info " name="redirect_to_products"><i class="fa fa-save"></i>
          See More Products</button>
      </div>
    </div>
  </div>
</div>
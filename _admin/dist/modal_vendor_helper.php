<!-- ADD VENDOR/HELPER -->
<div class="modal fade" id="modalAddVendorHelper">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">
      <!-- HEADER -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Add Vendor Helper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formAddVendorHelper" method="POST" action="includes/vendor_helper_crud.php" enctype="multipart/form-data">
          <!-- PRODUCTS -->
          <div class="form-group mb-2">
            <label for="">Name</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" placeholder="Enter Vendor/Helper Name" name="vendor_helper_name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user-friends"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label for="">Address</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" placeholder="Enter Vendor/Helper Address" name="vendor_helper_address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-map-marker-alt"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label for="">Contact Number</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" placeholder="Enter Vendor/Helper Contact Number (09)" name="vendor_helper_contact" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-phone"></span>
                </div>
              </div>
            </div>
          </div>
          <!-- GENDER EDUCATION -->
          <div class="form-group mb-2">
            <label for="exampleInputEmail1">Role</label>
            <!-- GENDER -->
            <div class="form-group p-2 border border-1 rounded ">
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success role" type="radio" id="roleVendor" value="Vendor" name="role">
                <label for="roleVendor" class="custom-control-label">Vendor</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success role " type="radio" id="roleHelper" value="Helper" name="role">
                <label for="roleHelper" class="custom-control-label">Helper</label>
              </div>
            </div>
          </div>
          <p class="text-primary text-bold m-0">
            <i class="fa fa-plus-square pr-1"></i>
            Proceeding with this operation will add vendor/helper to this stallholder.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="formAddVendorHelper" class="btn btn-primary " name="add_vendor_helper">
          <i class="fa fa-check"></i>
          Save
        </button>
      </div>
    </div>
  </div>
</div>

<!-- EDIT VENDOR/HELPER -->
<div class="modal fade" id="modalEditVendorHelper">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white">Edit a Vendor/Helper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditVendorHelper" method="POST" action="includes/vendor_helper_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <input type="hidden" class="vendor-helper-id" id="vendorHelperId" name="vendor_helper_id" hidden>
          <!-- PRODUCTS -->
          <div class="form-group mb-2">
            <label for="">Name</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control edit-vendor-helper-name" placeholder="Enter Vendor/Helper Name" name="vendor_helper_name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user-friends"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label for="">Address</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control edit-vendor-helper-address" placeholder="Enter Vendor/Helper Address" name="vendor_helper_address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-map-marker-alt"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label for="">Contact Number</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control edit-vendor-helper-contact" placeholder="Enter Vendor/Helper Contact Number (09)" name="vendor_helper_contact" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-phone"></span>
                </div>
              </div>
            </div>
          </div>
          <!-- GENDER EDUCATION -->
          <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <!-- GENDER -->
            <div class="form-group p-2 border border-1 rounded ">
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success role" type="radio" id="editRoleVendor" value="Vendor" name="edit_role">
                <label for="editRoleVendor" class="custom-control-label">Vendor</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success role " type="radio" id="editRoleHelper" value="Helper" name="edit_role">
                <label for="editRoleHelper" class="custom-control-label">Helper</label>
              </div>
            </div>
          </div>
          <p class="text-success text-bold m-0">
            <i class="fa fa-edit pr-1"></i>
            Proceeding with this operation will edit this vendor's/helper's details.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="formEditVendorHelper" class="btn btn-success " name="edit_vendor_helper">
          <i class="fa fa-check"></i>
          Edit
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE VENDOR/HELPER -->
<div class="modal fade" id="modalDeleteVendorHelper">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Delete a Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formDeleteVendorHelper" method="POST" action="includes/vendor_helper_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <div class="d-flex flex-column">
            <!-- STALLHOLDER ID -->
            <input type="hidden" class="stallholder-id" id="stallholderId" name="stallholder_id" hidden>
            <input type="hidden" class="vendor-helper-id" id="vendorHelperId" name="vendor_helper_id" hidden>
            <div class="text-center">
              <p class="mb-2">Are you sure you want to delete this vendor/helper?</p>
              <!-- FULL NAME -->
              <h2 class="bold mb-2 vendor-helper-name" id="nameVendorHelper"></h2>
              <p class="text-danger text-bold m-0">
                <i class="fa fa-exclamation-triangle pr-1"></i>
                Proceeding with this operation will erase this vendor/helper permanently including their details.
              </p>
            </div>
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
        <button type="submit" form="formDeleteVendorHelper" class="btn btn-danger " name="delete_stall_vendor">
          <i class="fa fa-check"></i>
          Delete
        </button>
      </div>
    </div>
  </div>
</div>
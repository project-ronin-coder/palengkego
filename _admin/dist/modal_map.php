<!-- LEGEND -->
<div class="modal fade" id="viewLegend">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-2 border-main">
      <!-- HEADER -->
      <div class="modal-header bg-main">
        <h5 class="modal-title text-white">Guide for Map Sections</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <ul class="list-group mb-2">
          <li class="list-group-item bg-main text-light" aria-current="true">Guide</li>
          <li class="list-group-item">1. Click the section you want to locate</li>
          <li class="list-group-item">2. Click again to remove the selection</li>
          <li class="list-group-item">3. Click/Hover to specific sections on the map to know the Section Name</li>
        </ul>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 p-2 ">
              <h4>Filter Section Occupancy</h4>
              <button id="btnOccupied" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-occupied right px-2 mr-2">‎ </span>
                <span class="mr-2">Occupied</span>
                <i class="fa fa-times"></i>
              </button>
              <button id="btnUnoccupied" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-unoccupied right px-2 mr-2">‎ </span>
                <span class="mr-2">Unoccupied</span>
                <i class="fa fa-times"></i>
              </button>
              <!-- <button id="btnUnfilter" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-occupied right px-2 mr-2">‎ </span>
                <span class="mr-2">Unfilter</span>
                <i class="fa fa-times"></i>
              </button> -->
            </div>
            <div class="col-md-8 p-2 ml-auto">
              <h4>Filter Section </h4>
              <button id="btnDG" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-dgs right px-2 mr-2">‎ </span>
                <span class="mr-2">Dry Goods Section</span>
                <i class="fa fa-times"></i>
              </button>
              <button id="btnDGAS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-dgas right px-2 mr-2">‎ </span>
                <span class="mr-2">Dry Goods Annex Section-Muslim</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnGS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-gs right px-2 mr-2">‎ </span>
                <span class="mr-2">Grocery Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnGSE" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-gse right px-2 mr-2">‎ </span>
                <span class="mr-2">Grocery Section Extension</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnFS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-fs right px-2 mr-2">‎ </span>
                <span class="mr-2">Fish Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnMS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-ms right px-2 mr-2">‎ </span>
                <span class="mr-2">Meat Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnFRTS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-frts right px-2 mr-2">‎ </span>
                <span class="mr-2">Fruit Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnVGTS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-vgts right px-2 mr-2">‎ </span>
                <span class="mr-2">Vegetable Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnFVE" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-fve right px-2 mr-2">‎ </span>
                <span class="mr-2">Fruit and Vegetable Section Extension</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnPFS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-pfs right px-2 mr-2">‎ </span>
                <span class="mr-2">Processed Foods Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnCS" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-cs right px-2 mr-2">‎ </span>
                <span class="mr-2">Carinderia Section</span>
                <i class="fa fa-times mr-2"></i>
              </button>
              <button id="btnAdmin" class="btn btn-danger d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-admin right px-2 mr-2">‎ </span>
                <span class="mr-2">Admin Office</span>
                <i class="fa fa-times mr-2"></i>
              </button>
            </div>
          </div>
        </div>


      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat " data-dismiss="modal">
          <i class="fa fa-close"></i>
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DISPLAY RECORD FOUND -->
<div class="modal fade" id="displayRecordFound">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <div class="m-0 p-0">
          <div class="d-flex flex-row justify-content-center align-items-center">
            <i class="fa fa-check-circle fa-2x mr-2"></i>
            <h2 class="m-0">Record Found!</h2>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- ID -->
        <input type="hidden" class="id" id="Id" name="id" hidden>
        <input type="hidden" class="stall-id" id="stallId" name="id" hidden>
        <input type="hidden" class="stall-owner-id" id="stallOwnerId" name="id" hidden>
        <input type="hidden" class="stall-section" id="stallSection" name="id" hidden>
        <!-- STALL PHOTO -->
        <img class="img-thumbnail mx-auto d-block mb-2" id="stallPhoto" src="">
        <!-- STALL NAME -->
        <p class="m-0"><strong class="mr-2">Stall Name:</strong><span class="stall-name"></span></p>
        <!-- STALL OWNER NAME -->
        <p class="m-0"><strong class="mr-2">Stallholder:</strong><span class="stallholder"></span></p>
        <hr class="my-2">
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">
          <i class="fa fa-times pr-1"></i> Close</button>
        <button type="button" class="btn-unassign btn btn-danger " data-toggle='modal' data-target='#modalUnassignStall' data-dismiss='modal'>
          <i class="fa fa-trash pr-1"></i>
          Unassign
        </button>
      </div>
    </div>
  </div>
</div>

<!-- DISPLAY NO RECORD FOUND-->
<div class="modal fade" id="displayError">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <div class="m-0 p-0">
          <h5 class="modal-title">Section: <span class="stall-section" id="stallSection"></span></h5>
          <h5 class="modal-title">Section ID: <span class="stall-id" id="stallId"></span></h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body d-flex flex-column justify-content-center align-items-center">
        <i class="fa fa-times-circle fa-5x text-danger mb-3"></i>
        <h1 class="text-center">No Record Found!</h1>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="submit" form="editStoreApplicant" class="btn btn-success " data-toggle="modal" data-target="#modalReassignStall" data-dismiss="modal">
          <i class="fa fa-plus pr-1"></i>
          Reassign
        </button>
        <button type="submit" form="editStoreApplicant" class="btn btn-primary " data-toggle="modal" data-target="#modalAssignStallholderTable" data-dismiss="modal">
          <i class="fa fa-plus pr-1"></i>
          Assign
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ASSIGN STALLHOLDER TABLE -->
<div class="modal fade" id="modalAssignStallholderTable" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content border-3 border-primary">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLongTitle">Choose a Stallholder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="assign-table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <!-- TABLE HEAD -->
              <th>Valid ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- TABLE DATA -->
            <?php include 'fetch/_map_assign_fetch.php' ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- REASSIGN STALLHOLDER TABLE -->
<div class="modal fade" id="modalReassignStall" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content border-3 border-success">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Reassign a Stall</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="reassign-table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <!-- TABLE HEAD -->
              <th>Stall Photo</th>
              <th>Stall Owner</th>
              <th>Stall Name</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- TABLE DATA -->
            <?php include 'fetch/_map_reassign_fetch.php' ?>
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ASSIGN STALLHOLDER-->
<div class="modal fade" id="modalAssignStallholder" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title">Assign Stallholder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formAssignStallholder" method="POST" action="includes/map_crud.php" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="stall-section-id" id="stallsectionId" name="stallsection_id" hidden>
          <input type="hidden" class="stallholder-id" id="stallholderId" name="stallholder_id" hidden>
          <div class="text-center">
            <p class="mb-2">Are you sure you want to assign this stallholder to <span class="stall-section"></span>
              Section?
            </p>
            <p class="font-weight-bold mb-2">Here are the details of the stallholder</p>
            <!-- ID PHOTO -->
            <div class="d-flex flex-column justify-content-center">
              <div>
                <img class="img-thumbnail w-50 mx-auto d-block" id="photoValidId" src="../valid_id/default_id.png" onclick="triggerClick()" style="flex-shrink: 0;">
                <label for="photoValidId" class="text-center">Valid ID</label>
              </div>
            </div>
            <!-- FULL NAME -->
            <div class="input-group">
              <label for="approveFirstName" class="col-sm-4 col-form-label text-left">Full Name:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span class="full-name" id="fullName"></span>
              </div>
            </div>
            <!-- ADDRESS -->
            <div class="input-group">
              <label for="approveAddress" class="col-sm-4 col-form-label text-left">Address:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span class="full-name" id="address"></span>
              </div>
            </div>
            <!-- CONTACT NUMBER -->
            <div class="input-group">
              <label for="approveContactNumber" class="col-sm-4 col-form-label text-left">Contact Number:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span class="full-name" id="contactNumber"></span>
              </div>
            </div>
            <!-- EMAIL -->
            <div class="input-group">
              <label for="approveEmail" class="col-sm-4 col-form-label text-left">Email:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span class="full-name" id="email"></span>
              </div>
            </div>
            <!-- TEMPORARY STALL NAME -->
            <div class="input-group">
              <label for="approveEmail" class="col-sm-4 col-form-label text-left">Temporary Stall Name:</label>
              <div class="input-group-sm col-sm-8 d-flex align-items-center">
                <input type="text" class="form-control temp-stall-name" id="tempStallName" name="temp_stall_name" placeholder="Enter Temporary Stall Name" required>
              </div>
            </div>
          </div>
          <p class="text-success text-bold m-0">
            <i class="fa fa-plus-square pr-1"></i>
            Proceeding with this operation will assign this stallholder to this section: Section ID: <span class="stall-id"></span>
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formAssignStallholder" class="btn btn-primary " name="assign_stallholder"><i class="fa fa-check"></i>
          Assign</button>
      </div>

    </div>
  </div>
</div>

<!-- REASSIGN STALLHOLDER-->
<div class="modal fade" id="modalReassignStallholder" role="dialog" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable ">
    <div class="modal-content border-2 border-success">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h5 class="modal-title">Reassign Stallholder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formReassignStallholder" method="POST" action="includes/map_crud.php" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="stall-section-id" id="stallsectionId" name="stallsection_id" hidden>
          <input type="hidden" class="stall-id" id="stallId" name="stall_id" hidden>
          <div class="text-center">
            <p class="mb-2">Are you sure you want to reassign this stall to <span class="stall-section"></span>
              Section?
            </p>
            <p class="font-weight-bold mb-2">Here are the details of the stall</p>
            <!-- ID PHOTO -->
            <div class="d-flex flex-column justify-content-center">
              <div>
                <img class="img-thumbnail w-50 mx-auto d-block" id="reassignStallPhoto" src="" onclick="triggerClick()" style="flex-shrink: 0;">
                <label for="photoValidId" class="text-center">Stall Photo</label>
              </div>
            </div>
            <!-- STALL NAME -->
            <div class="input-group">
              <label for="approveFirstName" class="col-sm-4 col-form-label text-left">Stall Name:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span id="reassignStallName"></span>
              </div>
            </div>
            <!-- STALLHOLDER -->
            <div class="input-group">
              <label for="approveFirstName" class="col-sm-4 col-form-label text-left">Stallholder:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span id="reassignStallholder"></span>
              </div>
            </div>
            <!-- ADDRESS -->
            <div class="input-group">
              <label for="approveAddress" class="col-sm-4 col-form-label text-left">Address:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span id="reassignAddress"></span>
              </div>
            </div>
            <!-- CONTACT NUMBER -->
            <div class="input-group">
              <label for="approveContactNumber" class="col-sm-4 col-form-label text-left">Contact Number:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span id="reassignContactNumber"></span>
              </div>
            </div>
            <!-- EMAIL -->
            <div class="input-group">
              <label for="approveEmail" class="col-sm-4 col-form-label text-left">Email:</label>
              <div class="col-sm-8 text-left d-flex align-items-center">
                <span id="reassignEmail"></span>
              </div>
            </div>
          </div>
          <p class="text-success text-bold m-0">
            <i class="fa fa-plus-square pr-1"></i>
            Proceeding with this operation will re-assign this stallholder to this section: Section ID: <span class="stall-id"></span>
          </p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formReassignStallholder" class="btn btn-success " name="reassign_stall">
          <i class="fa fa-check"></i>
          Reassign
        </button>
      </div>
    </div>
  </div>
</div>

<!-- UNASSIGN STALL-->
<div class="modal fade" id="modalUnassignStall">
  <div class="modal-dialog modal-dialog-scrollable ">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title">Unassign Stall</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formDeleteStall" method="POST" action="includes/map_crud.php" enctype="multipart/form-data">
          <!-- STALL ID -->
          <input type="hidden" class="id" id="id" name="stall_id" hidden>
          <div class="text-center">
            <p>Are you sure you want to unassign this stall?</p>
            <!-- FULL NAME -->
            <h2 class="bold stall-name"></h2>
            <p>Owned by: <span class="stallholder"></span></p>
          </div>
          <p class="text-danger text-bold m-0">
            <i class="fa fa-exclamation-triangle pr-1"></i>
            Proceeding with this operation will unassign this stallholder to Section ID: <span class="stall-section"></span>
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formDeleteStall" class="btn btn-danger " name="unassign_stall"><i class="fa fa-trash"></i>
          Delete</button>
      </div>
    </div>
  </div>
</div>
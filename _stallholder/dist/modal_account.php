<!-- MODAL : EDIT ACCOUNT MENU -->
<div class="modal fade" id="modalEditAccount">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-main">
      <!-- HEADER -->
      <div class="modal-header bg-main">
        <h5 class="modal-title text-white">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white" aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <input type="hidden" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="id">
        <div class="list-group">
          <button id="btnEditPersonalDetails" type="button" class="edit-group-item list-group-item list-group-item-action font-weight-normal m-0" data-toggle="modal" data-target="#modalUpdatePersonalDetails" data-dismiss="modal">Edit Personal Details</button>
          <button id="btnUpdateValidID" type="button" class="edit-group-item list-group-item list-group-item-action font-weight-normal m-0" data-toggle="modal" data-target="#modalValidIDStallholder" data-dismiss="modal">Update Valid ID</button>
          <button id="btnUpdateEmail" type="button" class="edit-group-item list-group-item list-group-item-action font-weight-normal m-0" data-toggle="modal" data-target="#modalUpdateEmail" data-dismiss="modal">Update Email</button>
          <button id="btnUpdateUsername" type="button" class="edit-group-item list-group-item list-group-item-action font-weight-normal m-0" data-toggle="modal" data-target="#modalUpdateUsername" data-dismiss="modal">Update Username</button>
          <button id="btnChangePassword" type="button" class="edit-group-item list-group-item list-group-item-action font-weight-normal m-0" data-toggle="modal" data-target="#modalUpdatePassword" data-dismiss="modal">Change Password</button>
        </div>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger w-100" data-toggle="modal" data-target="#modalDeactivateAccount" data-dismiss="modal">
          <i class="fa fa-trash"></i>
          Deactivate Account
        </button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL : UPDATE PERSONAL DETAILS -->
<div class="modal fade" id="modalUpdatePersonalDetails" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white">Update Personal Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formUpdatePersonalDetails" method="POST" action="includes/account_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <!-- ID -->
          <input type="hidden" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="stallholder_id">
          <div class="form-group ">
            <!-- FIRST NAME -->
            <label for="exampleInputEmail1">First Name</label>
            <div class="input-group">
              <input type="text" class="form-control first-name" id="firstName" name="first_name" placeholder="First Name" required>
            </div>
          </div>
          <div class="form-group ">
            <!-- MIDDLE NAME -->
            <label for="exampleInputEmail1">Middle Name</label>
            <div class="input-group">
              <input type="text" class="form-control middle-name " id="middleName" name="middle_name" placeholder="Middle Name" required>
            </div>
          </div>
          <div class="form-group ">
            <!-- LAST NAME -->
            <label for="exampleInputEmail1">Last Name</label>
            <div class="input-group">
              <input type="text" class="form-control last-name " id="lastName" name="last_name" placeholder="Last Name" required>
            </div>
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">Present Address (House/Lot/Blk, Street, Barangay,
              City/Municipality, Province)</label>
            <!-- PRESENT ADDRESS -->
            <div class="input-group">
              <input type="text" class="form-control address " id="address" name="address" placeholder="Present Address" required>
            </div>
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">Contact Number</label>
            <!-- CONTACT NUMBER -->
            <div class="input-group">
              <input type="text" class="form-control contact-number " id="contactNumber" name="contact_number" placeholder="Contact Number" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
            </div>
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">Date of Birth</label>
            <div class="input-group mb-3 date" id="dateOfBirth" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input " value="<?php echo $date_of_birth ?>" data-target="#dateOfBirth" data-toggle="datetimepicker" id="dateOfBirth" name="date_of_birth" required />
            </div>
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">Place of Birth</label>
            <!-- PLACE OF BIRTH -->
            <div class="input-group mb-3">
              <input type="text" class="form-control place-of-birth " id="placeOfBirth" name="place_of_birth" placeholder="Place of Birth" required>
            </div>
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">Religion</label>
            <!-- Religion -->
            <div class="input-group mb-3">
              <input type="text" class="form-control religion " id="religion" name="religion" placeholder="Religion" required>
            </div>
          </div>
          <!-- MARITAL STATUS -->
          <div class="form-group ">
            <label>Marital Status</label>
            <div class="form-group p-2 border border-1 rounded ">
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success marital-status " type="radio" id="maritalStatus1" name="marital_status" value="Single">
                <label for="maritalStatus1" class="custom-control-label">Single</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success marital-status " type="radio" id="maritalStatus2" name="marital_status" value="Married">
                <label for="maritalStatus2" class="custom-control-label">Married</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success marital-status " type="radio" id="maritalStatus3" name="marital_status" value="Widowed">
                <label for="maritalStatus3" class="custom-control-label">Widowed</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success marital-status " type="radio" id="maritalStatus4" name="marital_status" value="Cohabiting">
                <label for="maritalStatus4" class="custom-control-label">Cohabiting</label>
              </div>
            </div>
          </div>
          <!-- SPOUSE -->
          <div class="form-group " id="spouseInfo">
            <label>Spouse Information</label>
            <div class="form-group p-2 border border-1 rounded " id="spouseInfo">
              <div class="form-group">
                <input type="text" class="form-control form-control-border " id="spouseName" placeholder="Spouse Name" name="spouse_name">
                <input type="text" class="form-control form-control-border " id="spouseOccupation" placeholder="Occupation" name="spouse_occupation">
              </div>
            </div>
          </div>
          <div class="form-group ">
            <label for="exampleInputEmail1">Gender</label>
            <!-- GENDER -->
            <div class="form-group p-2 border border-1 rounded ">
              <label>Gender</label>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success gender " type="radio" id="male" value="Male" name="gender">
                <label for="male" class="custom-control-label">Male</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success gender " type="radio" id="female" value="Female" name="gender">
                <label for="female" class="custom-control-label">Female</label>
              </div>
              <div class="form-group">
                <label class="p-0 m-0" for="otherGender">Others</code></label>
                <input type="text" class="form-control form-control-border " id="otherGender" placeholder="Please Specify" name="other_gender">
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label for="exampleInputEmail1">Educational Attainment</label>
            <!-- EDUCATIONAL ATTAINMENT -->
            <div class="form-group p-2 border border-1 rounded ">
              <label>Educational Attainment</label>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success education " type="radio" id="elementary" name="education" value="Elementary">
                <label for="elementary" class="custom-control-label">Elementary</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success education " type="radio" id="secondary" name="education" value="Secondary">
                <label for="secondary" class="custom-control-label">Secondary</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input custom-control-input-success education " type="radio" id="tertiary" name="education" value="Tertiary">
                <label for="tertiary" class="custom-control-label">Tertiary</label>
              </div>
              <div class="form-group">
                <label class="p-0 m-0" for="otherEducation">Others</code></label>
                <input type="text" class="form-control form-control-border " id="otherEducation" value="" placeholder="Please Specify" name="other_education">
              </div>
            </div>
          </div>
          <p class="text-success text-bold m-0">
            <i class="fa fa-edit pr-1"></i>
            Proceeding with this operation will edit your personal details.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default  mr-auto" data-toggle="modal" data-target="#modalEditAccount" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Back
        </button>
        <button type="submit" form="formUpdatePersonalDetails" class="btn btn-success " name="update_stallholder_personal_details">
          <i class="fa fa-check"></i>
          Update
        </button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL : CHANGE VALID ID -->
<div class="modal fade" id="modalValidIDStallholder" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-info">
      <!-- HEADER -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Update Stallholder ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formUpdateValidID" method="POST" action="includes/account_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <div class="d-flex flex-column">
            <p class="text-center pb-2 mb-0">Are you sure you want to change your valid id?
            </p>
            <img class="img-thumbnail mx-auto d-block mb-2 " id="newStallholderValidId" src="" onclick="triggerClick()" style="width: 100%; flex-shrink: 0;">
            <!-- ID -->
            <input type="hidden" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="stallholder_id">
          </div>
          <!-- STORE INPUT -->
          <div class="input-group mb-2">
            <div class="custom-file d-flex">
              <input type="file" class="form-control custom-file-input stallholder-valid-id" id="StallholderValidId" name="valid_id" onchange="displayImage(this)" required>
              <label class="custom-file-label" for="updateStallholderId">Choose a new valid id</label>
            </div>
          </div>
          <p class="text-info text-bold m-0">
            <i class="fa fa-info pr-1"></i>
            Proceeding with this operation will update your valid id.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default mr-auto" data-toggle="modal" data-target="#modalEditAccount" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Back
        </button>
        <button type="submit" form="formUpdateValidID" class="btn btn-info" name="update_stallholder_valid_id"><i class="fa fa-check-square-o"></i>
          <i class="fa fa-check"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL : UPDATE EMAIL-->
<div class="modal fade" id="modalUpdateEmail" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">
      <!-- HEADER -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Update Email Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formUpdateEmail" method="POST" action="includes/account_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <!-- ID -->
          <input type="hidden" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="stallholder_id">
          <div class="form-group mb-2">
            <label for="email">Email Address</label>
            <!-- EMAIL -->
            <div class="input-group mb-3">
              <input type="email" class="form-control email " id="email" name="email" placeholder="Enter new email address" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-envelope"></span>
                </div>
              </div>
            </div>
          </div>
          <p class="text-primary text-bold m-0">
            <i class="fa fa-edit pr-1"></i>
            Proceeding with this operation will update your email address.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default  mr-auto" data-toggle="modal" data-target="#modalEditAccount" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Back
        </button>
        <button type="submit" form="formUpdateEmail" class="btn btn-primary " name="update_stallholder_email"><i class="fa fa-check-square-o"></i>
          <i class="fa fa-check"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL : UPDATE USERNAME -->
<div class="modal fade" id="modalUpdateUsername" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">
      <!-- HEADER -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Update Username</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formUpdateUsername" method="POST" action="includes/account_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <!-- ID -->
          <input type="hidden" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="stallholder_id">
          <div class="form-group mb-2">
            <label for="exampleInputEmail1">Username</label>
            <!-- EMAIL -->
            <div class="input-group mb-3">
              <input type="text" class="form-control username" id="username" name="username" placeholder="Enter new username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
            <p class="text-primary text-bold m-0">
              <i class="fa fa-edit pr-1"></i>
              Proceeding with this operation will update your username.
            </p>
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default  mr-auto" data-toggle="modal" data-target="#modalEditAccount" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Back
        </button>
        <button type="submit" form="formUpdateUsername" class="btn btn-primary " name="update_stallholder_username"><i class="fa fa-check-square-o"></i>
          <i class="fa fa-check"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL : UPDATE PASSWORD -->
<div class="modal fade" id="modalUpdatePassword" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">
      <!-- HEADER -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formChangePassword" method="POST" action="includes/account_crud.php" enctype="multipart/form-data">
          <!-- STALLHOLDER ID -->
          <!-- ID -->
          <input type="hidden" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="stallholder_id">
          <div class="form-group">
            <label for="password">Old Password</label>
            <!-- PASSWORD -->
            <div class="input-group mb-3">
              <input type="password" class="form-control password " id="password" name="old_password" placeholder="Enter old password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password">New Password</label>
            <!-- PASSWORD -->
            <div class="input-group mb-3">
              <input type="password" class="form-control password " id="password" name="new_password" placeholder="Enter new password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div id="retypePasswordContainer" class="form-group">
            <label for="retypePassword">Retype Password</label>
            <!-- PASSWORD -->
            <div class="input-group mb-3">
              <input type="password" class="form-control retype-password " id="retypePassword" name="retype_password" placeholder="Retype password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <!-- SHOW PASSWORD | REMEMBER ME -->
          <div id="passwordShowHide" class="row ">
            <div class="col">
              <div class="icheck-primary">
                <input type="checkbox" class="show-hide-password" id="showHidePassword" value="Show">
                <label for="showHidePassword" class="label-password" id="labelPassword">
                  Show Password
                </label>
              </div>
            </div>
          </div>
          <p class="text-primary text-bold m-0">
            <i class="fa fa-edit pr-1"></i>
            Proceeding with this operation will change your password.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default  mr-auto" data-toggle="modal" data-target="#modalEditAccount" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Back
        </button>
        <button type="submit" form="formChangePassword" class="btn btn-primary " name="change_stallholder_password"><i class="fa fa-check-square-o"></i>
          <i class="fa fa-check"></i>
          Update
        </button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL : DEACTIVATE ACCOUNT -->
<div class="modal fade" id="modalDeactivateAccount" data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Deactivate Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body d-flex flex-column justify-content-center align-items-center">
        <i class="fa fa-exclamation-triangle fa-5x text-danger mb-3"></i>
        <h5 class="text-center">Are you sure you want to deactivate this account?</h5>
        <p class="text-center text-danger text-bold">
          Proceeding with this operation will make this account, including the stalls and products assigned to it, unavailable for use.
        </p>
        <form id="formDeactivateUser" method="POST" action="includes/account_crud.php" enctype="multipart/form-data">
          <!-- ID -->
          <input type="text" value="<?php echo $stallholder_id ?>" class="stallholder-id" id="stallholderId" name="stallholder_id">
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default  mr-auto" data-toggle="modal" data-target="#modalEditAccount" data-dismiss="modal">
          <i class="fa fa-step-backward"></i>
          Cancel
        </button>
        <button type="submit" form="formDeactivateUser" class="btn btn-danger " name="deactivate_user_account"><i class="fa fa-trash"></i>
          Delete</button>
      </div>
    </div>
  </div>
</div>
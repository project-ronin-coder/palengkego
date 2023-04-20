<!-- ADD -->
<div class="modal fade" id="modalAddStallApplicant" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-primary">
      <!-- HEADER -->
      <div class="modal-header bg-primary">
        <h5 class="modal-title">Add New Stallholder Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <div class="card-body p-0">
          <form class="form-horizontal" id="formAddStallApplicant" action="includes/applicants_crud.php" method="POST" enctype="multipart/form-data">
            <div class="tab-content">
              <div class="tab-pane active" id="personalInfo">
                <!-- EDIT PERSONAL INFO -->
                <div id="containerAddPersonalInfo">
                  <h4 class="text-center">Part 1: Personal Information</h4>
                  <hr>
                  <!-- FIRST NAME -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control first-name " id="firstName" name="first_name" placeholder="Enter First Name" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- MIDDLE NAME -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control middle-name " id="middleName" name="middle_name" placeholder="Enter Middle Name" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- LAST NAME -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control last-name " id="lastName" name="last_name" placeholder="Enter Last Name" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-user"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- PRESENT ADDRESS & CONTACT NUMBER -->

                  <!-- PRESENT ADDRESS -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Present Address (House/Lot/Blk, Street, Barangay,
                      City/Municipality, Province)</label>
                    <div class="input-group">
                      <input type="text" class="form-control address " id="address" name="address" placeholder="Enter Present Address" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-map-marker-alt"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- CONTACT NUMBER -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <div class="input-group">
                      <input type="text" class="form-control contact-number " id="contactNumber" name="contact_number" placeholder="Enter Contact Number" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-phone"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- DATE OF BIRTH  -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <div class="input-group mb-3 date" id="dateOfBirth" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input " placeholder="Enter Date of Birth" data-target="#dateOfBirth" data-toggle="datetimepicker" id="dateOfBirth" name="date_of_birth" required />
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- PLACE OF BIRTH -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Place of Birth</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control place-of-birth " id="placeOfBirth" name="place_of_birth" placeholder="Enter Place of Birth" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-map-marker-alt"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- RELIGION MARITAL STATUS -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Religion</label>
                    <!-- Religion -->
                    <div class="input-group mb-3">
                      <input type="text" class="form-control religion " id="religion" name="religion" placeholder="Enter Religion" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-praying-hands"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- MARITAL STATUS -->
                  <div class="form-group">
                    <label>Marital Status</label>
                    <div class="form-group p-2 border border-1 rounded">
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
                  <div class="form-group" id="spouseInfo">
                    <label>Spouse Information</label>
                    <div class="form-group p-2 border border-1 rounded col-sm" id="spouseInfo">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-border " id="spouseName" placeholder="Enter Spouse Name" name="spouse_name">
                        <input type="text" class="form-control form-control-border " id="spouseOccupation" placeholder="Enter Occupation" name="spouse_occupation">
                      </div>
                    </div>
                  </div>
                  <!-- GENDER EDUCATION -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <!-- GENDER -->
                    <div class="form-group p-2 border border-1 rounded ">
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
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Educational Attainment</label>
                    <!-- EDUCATIONAL ATTAINMENT -->
                    <div class="form-group p-2 border border-1 rounded ">
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
                </div>
              </div>
              <div class="tab-pane" id="accountInfo">
                <!-- EDIT ACCOUNT INFO -->
                <div id="containerAddAccountInfo">
                  <h4 class="text-center">Part 2: Account Information</h4>
                  <hr>
                  <!-- VALID ID IMAGE-->
                  <div class="input-group mb-3 d-flex">
                    <img class="img-thumbnail w-50 mx-auto d-block" id="addValidId" src="../src/valid_id/default_id.png" onclick="triggerClick()" style="flex-shrink: 0;">
                  </div>
                  <!-- VALID ID INPUT -->
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="form-control custom-file-input valid-id" id="valid-id" name="valid_id" onchange="displayImage(this)" required>
                      <label class="custom-file-label" for="valid-id">Upload a valid id picture</label>
                    </div>
                  </div>
                  <!-- USERNAME -->
                  <div class="form-group ">
                    <label for="editUsername" class="col-form-label">Username</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control username" id="Username" name="username" placeholder="Enter Username" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <!-- EMAIL -->
                    <div class="input-group mb-3">
                      <input type="email" class="form-control email " id="email" name="email" placeholder="Enter Email" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-envelope"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <!-- PASSWORD -->
                    <div class="input-group mb-3">
                      <input type="password" class="form-control password " name="password" placeholder="Enter Password" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="retypePasswordContainer" class="form-group">
                    <label for="retypePassword">Retype Password</label>
                    <!-- RETYPE PASSWORD -->
                    <div class="input-group mb-3">
                      <input type="password" class="form-control retype-password " name="retype_password" placeholder="Retype password" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fa fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- SHOW PASSWORD | REMEMBER ME -->
                  <div class="form-group clearfix">
                    <div class="icheck-primary mb-3">
                      <input type="checkbox" class="show-hide-password" id="showPassword">
                      <label for="showPassword" class="label-password">
                        Show Password
                      </label>
                    </div>
                    <div class="icheck-primary ">
                      <input type="checkbox" id="Agreement" required>
                      <label for="Agreement" id="labelAgreement">
                        I hereby declare that all the above information is correct and accurate. I solemnly declare
                        that
                        all the information furnished in this document is free of errors to the best of my knowledge.
                        I
                        hereby declare that all the information contained in this application form is in accordance
                        with
                        facts or truths to my knowledge.
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-header p-0 border-0 w-100">
                <ul class="nav nav-pills p-0 m-0 d-flex justify-content-between align-items-center">
                  <li class="nav-item">
                    <a id="btnPersonalInfo" class="nav-link active-link bg-main text-white" href="#personalInfo" data-toggle="tab">
                      <span class="fa fa-angle-double-left mr-1 text-white"></span>
                      <span class="text-white">Previous</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a id="btnAccountInfo" class="nav-link bg-main text-white" href="#accountInfo" data-toggle="tab">
                      <span class="text-white">Next</span>
                      <span class="fa fa-angle-double-right ml-1 text-white"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formAddStallApplicant" class="btn btn-primary " name="add_applicant"><i class="fa fa-save"></i>
          Save</button>
      </div>
    </div>
  </div>
</div>

<!-- EDIT -->
<div class="modal fade" id="modalEditApplicant" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title">Edit Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditStallApplicant" method="POST" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- USER ID -->
          <input type="hidden" class="applicant-id" id="applicantId" name="applicant_id" hidden>

          <div class="tab-content">
            <div class="tab-pane active" id="editPersonalInfo">
              <!-- EDIT PERSONAL INFO -->
              <div id="containerEditPersonalInfo">
                <h4 class="text-center">Part 1: Personal Information</h4>
                <hr>
                <!-- STALLHOLDER NAME -->
                <input type="hidden" id="stallholder_Id" name="stallholder_id" hidden>
                <!-- FIRST NAME -->
                <div class="form-group">
                  <label for="editFirstName">First Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control edit-first-name " id="editFirstName" name="edit_first_name" placeholder="Edit First Name" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- MIDDLE NAME -->
                <div class="form-group">
                  <label for="editMiddleName">Middle Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control edit-middle-name " id="editMiddleName" name="edit_middle_name" placeholder="Edit Middle Name" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- LAST NAME -->
                <div class="form-group">
                  <label for="editLastName">Last Name</label>
                  <div class="input-group">
                    <input type="text" class="form-control edit-last-name " id="editLastName" name="edit_last_name" placeholder="Edit Last Name" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-user"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PRESENT ADDRESS & CONTACT NUMBER -->

                <!-- PRESENT ADDRESS -->
                <div class="form-group">
                  <label for="editAddress">Present Address (House/Lot/Blk, Street, Barangay,
                    City/Municipality, Province)</label>
                  <div class="input-group">
                    <input type="text" class="form-control edit-address " id="editAddress" name="edit_address" placeholder="Edit Present Address" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-map-marker-alt"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- CONTACT NUMBER -->
                <div class="form-group">
                  <label for="editContactNumber">Contact Number</label>
                  <div class="input-group">
                    <input type="text" class="form-control edit-contact-number " id="editContactNumber" name="edit_contact_number" placeholder="Edit Contact Number" pattern="(09[0-9]{9})" size="11" minlength="11" maxlength="11" onkeypress="return /[0-9]/i.test(event.key)" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-phone"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- DATE OF BIRTH  -->
                <div class="form-group">
                  <label for="editDateOfBirth">Date of Birth</label>
                  <div class="input-group mb-3 date" data-target-input="nearest">
                    <input type="text" data-target="#dateOfBirth" data-toggle="datetimepicker" value="" class="form-control datetimepicker-input edit-date-of-birth" placeholder="Edit Date of Birth" id="editDateOfBirth" name="edit_date_of_birth" required />
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PLACE OF BIRTH -->
                <div class="form-group">
                  <label for="editPlaceOfBirth">Place of Birth</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control edit-place-of-birth" id="editPlaceOfBirth" name="edit_place_of_birth" placeholder="Edit Place of Birth" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-map-marker-alt"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- RELIGION MARITAL STATUS -->
                <div class="form-group">
                  <label for="editReligion">Religion</label>
                  <!-- Religion -->
                  <div class="input-group mb-3">
                    <input type="text" class="form-control edit-religion" id="editReligion" name="edit_religion" placeholder="Edit Religion" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-praying-hands"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- MARITAL STATUS -->
                <div class="form-group">
                  <label>Marital Status</label>
                  <div class="form-group p-2 border border-1 rounded">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-marital-status " type="radio" id="editMaritalStatus1" name="edit_marital_status" value="Single">
                      <label for="editMaritalStatus1" class="custom-control-label">Single</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-marital-status " type="radio" id="editMaritalStatus2" name="edit_marital_status" value="Married">
                      <label for="editMaritalStatus2" class="custom-control-label">Married</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-marital-status " type="radio" id="editMaritalStatus3" name="edit_marital_status" value="Widowed">
                      <label for="editMaritalStatus3" class="custom-control-label">Widowed</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-marital-status " type="radio" id="editMaritalStatus4" name="edit_marital_status" value="Cohabiting">
                      <label for="editMaritalStatus4" class="custom-control-label">Cohabiting</label>
                    </div>
                  </div>
                </div>
                <!-- SPOUSE -->
                <div class="form-group" id="editSpouseInfo">
                  <label>Spouse Information</label>
                  <div class="form-group p-2 border border-1 rounded col-sm">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-border edit-spouse-name" id="editSpouseName" placeholder="Edit Spouse Name" name="edit_spouse_name">
                      <input type="text" class="form-control form-control-border edit-spouse-occupation" id="editSpouseOccupation" placeholder="Edit Occupation" name="edit_spouse_occupation">
                    </div>
                  </div>
                </div>
                <!-- GENDER EDUCATION -->
                <div class="form-group">
                  <label>Gender</label>
                  <!-- GENDER -->
                  <div class="form-group p-2 border border-1 rounded ">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-gender " type="radio" id="editMale" value="Male" name="edit_gender">
                      <label for="editMale" class="custom-control-label">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-gender " type="radio" id="editFemale" value="Female" name="edit_gender">
                      <label for="editFemale" class="custom-control-label">Female</label>
                    </div>
                    <div class="form-group">
                      <label class="p-0 m-0" for="ed">Others</code></label>
                      <input type="text" class="form-control form-control-border edit-other-gender" id="editOtherGender" placeholder="Please Specify" name="edit_other_gender">
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label>Educational Attainment</label>
                  <!-- EDUCATIONAL ATTAINMENT -->
                  <div class="form-group p-2 border border-1 rounded ">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-education " type="radio" id="editElementary" name="edit_education" value="Elementary">
                      <label for="editElementary" class="custom-control-label">Elementary</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-education " type="radio" id="editSecondary" name="edit_education" value="Secondary">
                      <label for="editSecondary" class="custom-control-label">Secondary</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input custom-control-input-success edit-education " type="radio" id="editTertiary" name="edit_education" value="Tertiary">
                      <label for="editTertiary" class="custom-control-label">Tertiary</label>
                    </div>
                    <div class="form-group">
                      <label class="p-0 m-0" for="editOtherEducation">Others</code></label>
                      <input type="text" class="form-control form-control-border edit-other-education" id="editOtherEducation" value="" placeholder="Please Specify" name="edit_other_education">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="editAccountInfo">
              <!-- EDIT ACCOUNT INFO -->
              <div id="containerEditAccountInfo">
                <h4 class="text-center">Part 2: Account Information</h4>
                <hr>
                <!-- PASSWORD -->
                <div class="form-group row mb-2">
                  <label for="first-name" class=" col-form-label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control old-password" id="editPassword" minlength="8" placeholder="Enter Password" required disabled>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <h4>Update Password</h4>
                <div class="form-group">
                  <label for="password">New Password</label>
                  <!-- PASSWORD -->
                  <div class="input-group mb-3">
                    <input type="password" class="form-control password " name="edit_password" placeholder="Enter new password">
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
                    <input type="password" class="form-control retype-password " name="retype_password" placeholder="Retype password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- SHOW PASSWORD | REMEMBER ME -->
                <div>
                  <div class="col">
                    <div class="icheck-primary">
                      <input type="checkbox" class="show-hide-password" id="editShowHidePassword">
                      <label for="editShowHidePassword" class="label-password" id="labelPassword">
                        Show Password
                      </label>
                    </div>
                  </div>
                </div>
                <p class="text-success text-bold ">
                  <i class="fa fa-edit pr-1"></i>
                  Proceeding with this operation will edit this applicant's account and personal details.
                </p>
              </div>
            </div>
            <div class="card-header p-0 border-0 w-100 mb-2">
              <ul class="nav nav-pills p-0 m-0 d-flex justify-content-between align-items-center">
                <li class="nav-item">
                  <a id="btnPersonalInfo" class="nav-link active-link bg-main text-white" href="#editPersonalInfo" data-toggle="tab">
                    <span class="fa fa-angle-double-left mr-1 text-white"></span>
                    <span class="text-white">Previous</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a id="btnAccountInfo" class="nav-link bg-main text-white" href="#editAccountInfo" data-toggle="tab">
                    <span class="text-white">Next</span>
                    <span class="fa fa-angle-double-right ml-1 text-white"></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formEditStallApplicant" class="btn btn-success " name="edit_applicant"><i class="fa fa-save"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>

<!-- EDIT USERNAME -->
<div class="modal fade" id="modalEditUsername" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title">Edit Username</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditUsername" method="POST" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- APPLICANT ID -->
          <input type="hidden" class="applicant-id" id="applicantId" name="applicant_id" hidden>
          <!-- USERNAME -->
          <div class="form-group row mb-2">
            <label for="editUsername" class="col-form-label">Username</label>
            <div class="input-group ">
              <input type="text" class="form-control edit-username" id="editUsername" name="edit_username" placeholder="Enter New Username" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div>
          </div>
          <p class="text-success text-bold m-0">
            <i class="fa fa-edit pr-1"></i>
            Proceeding with this operation will edit this applicant's username.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formEditUsername" class="btn btn-success " name="edit_applicant_username"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>

<!-- EDIT EMAIL -->
<div class="modal fade" id="modalEditEmail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-success">
      <!-- HEADER -->
      <div class="modal-header bg-success">
        <h5 class="modal-title">Edit Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditEmail" method="POST" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- USER ID -->
          <input type="hidden" class="applicant-id" id="applicantId" name="applicant_id" hidden>
          <!-- EMAIL -->
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <!-- EMAIL -->
            <div class="input-group mb-3">
              <input type="email" class="form-control edit-email" id="editEmail" name="edit_email" placeholder="Enter New Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-envelope"></span>
                </div>
              </div>
            </div>
            <p class="text-success text-bold m-0">
              <i class="fa fa-edit pr-1"></i>
              Proceeding with this operation will edit this applicant's email.
            </p>
          </div>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formEditEmail" class="btn btn-success " name="edit_applicant_email"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>

<!-- DELETE -->
<div class="modal fade" id="modalDeleteApplicant">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <h5 class="modal-title">Delete Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formdeleteApplicant" method="POST" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- USER ID -->
          <input type="hidden" class="applicant-id" id="applicantId" name="applicant_id" hidden>
          <div class="text-center">
            <p>Are you sure you want to delete this applicant?</p>
            <!-- FULL NAME -->
            <h2 class="bold full-name" id="fullName" name="full-name"></h2>
            <p class="text-danger text-bold m-0">
              <i class="fa fa-exclamation-triangle pr-1"></i>
              Proceeding with this operation will erase this stallholder including their details permanently.
            </p>
          </div>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formdeleteApplicant" class="btn btn-danger " name="delete_applicant"><i class="fa fa-trash"></i>
          Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- APPROVE -->
<div class="modal fade" id="modalApproveApplicant">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-info">
      <!-- HEADER -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Approve Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formApproveApplicant" method="POST" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="applicant-id" id="applicantId" name="approve_id" hidden>
          <input type="hidden" class="applicant-email" id="applicantEmail" name="approve_email" hidden>
          <div class="text-center">
            <p>Are you sure you want to verify this user?</p>
            <h4 class="full-name" id="fullName"></h4>
            <p class="email-address" id="emailAddress"></p>
            <p class="text-info text-bold m-0">
              <i class="fa fa-info-circle pr-1"></i>
              Proceeding with this operation will approve and send an email to the applicant regarding with his/her application as stallholder.
            </p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formApproveApplicant" class="btn btn-info " name="approve_applicant"><i class="fa fa-check"></i>
          Approve</button>
      </div>
    </div>
  </div>
</div>

<!-- VALID ID -->
<div class="modal fade" id="modalValidIdApplicant" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-info">
      <!-- HEADER -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Update Applicant Valid ID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formEditApplicant" method="POST" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="applicant-id" id="updateValidId" name="applicant_id" hidden>
          <!-- VALID ID -->
          <div class="d-flex flex-column">
            <p class="text-center pb-2 mb-0">Change valid id for</p>
            <!-- NAME -->
            <h4 class="full-name pb-2 mb-0 text-center"><b><span class="full-name" id="full-name"></span></b></h4>
            <img class="img-thumbnail mx-auto d-block mb-2 " id="validId" src="" onclick="triggerClick()" style="width: 100%; flex-shrink: 0;">
          </div>
          <!-- VALID ID INPUT -->
          <div class="input-group mb-2">
            <div class="custom-file d-flex">
              <input type="file" class="form-control custom-file-input update-valid-id" id="update-valid-id" name="update_valid_id" onchange="displayImage(this)" required>
              <label class="custom-file-label" for="update-valid-id">Upload a valid id picture</label>
            </div>
          </div>
          <p class="text-info text-bold m-0">
            <i class="fa fa-info pr-1"></i>
            Proceeding with this operation will change this applicants's valid id.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i>
          Close</button>
        <button type="submit" form="formEditApplicant" class="btn btn-info " name="upload_applicant_valid_id"><i class="fa fa-check-square-o"></i>
          Update</button>
      </div>
    </div>
  </div>
</div>

<!-- VENDOR HELPER -->
<div class="modal fade" id="modalViewVendorHelper">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content border-2 border-info">
      <!-- HEADER -->
      <div class="modal-header bg-info">
        <h5 class="modal-title">Add Vendor/Helper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- BODY -->
      <div class="modal-body">
        <!-- FORM -->
        <form class="form-horizontal" id="formViewVendorHelper" method="GET" action="includes/applicants_crud.php" enctype="multipart/form-data">
          <!-- ID -->
          <input type="hidden" class="applicant-id" id="updateValidId" name="applicant_id" hidden>
          <h5><strong>Vendor/Helper List</strong></h5>
          <hr>
          <ul class="list-group mb-2">
            <li class="list-group-item m-0">No Vendor/Helper Found</li>
          </ul>
          <p class="text-info text-bold m-0">
            <i class="fa fa-info pr-1"></i>
            Proceeding with this operation will redirect you to Vendor/Helper.
          </p>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" form="formViewVendorHelper" class="btn btn-info " name="redirect_to_vendor_helper"><i class="fa fa-save"></i>
          Add</button>
      </div>
    </div>
  </div>
</div>
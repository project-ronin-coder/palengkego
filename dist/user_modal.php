<!-- DISPLAY NO RECORD -->
<div class="modal fade" id="displayNoAccount">
  <!-- data-backdrop="static" data-keyboard="false" tabindex="-1" -->
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-2 border-danger">
      <!-- HEADER -->
      <div class="modal-header bg-danger">
        <div class="m-0 p-0">
          <h5 class="modal-title">Error!</h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- BODY -->
      <div class="modal-body d-flex flex-column justify-content-center align-items-center">
        <i class="fa fa-times-circle fa-5x text-danger mb-3"></i>
        <h5 class="text-center">Please login or create an account to access this feature</h5>
      </div>
      <!-- FOOTER -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Full screen modal -->

<div class="modal fade" id="displayProducts">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4">Product List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group products-view-group">
          <li class="list-group-item m-0">An item</li>
          <li class="list-group-item m-0">A second item</li>
          <li class="list-group-item m-0">A third item</li>
          <li class="list-group-item m-0">A fourth item</li>
          <li class="list-group-item m-0">And a fifth one</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Full screen modal -->

<div class="modal fade" id="displaySearch">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4">Product Search Results</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          About
          <?php
          $searchCount = $_SESSION['search_count'];
          echo $searchCount;
          ?>
          results searched.
        </p>
        <ul class="list-group">
          <?php
          if (isset($_SESSION['search_data'])) {
            $row = $_SESSION['search_data'];
            if ($row['numrows'] < 1) {
              echo '
                  <li class="list-group-item m-0">No Item Found</li>
                ';
            } else {
              try {
                $conn = $pdo->open();
                $stmt = $conn->prepare("
            SELECT 
            prod.id, prod.product_name, prod.stall_id, 
            ss.stall_id as section_id, ss.section,
            sh.first_name, sh.middle_name, sh.last_name,
            so.stall_name

            FROM `products` as prod 

            INNER JOIN stall_section as ss ON prod.section_id = ss.id
            INNER JOIN stalls_owned as so ON prod.stall_id = so.id
            INNER JOIN stall_holders as sh ON prod.stall_holder_id = sh.id

            WHERE product_name 
            LIKE :keyword
            ORDER BY stall_name ASC
            ");
                $stmt->execute(['keyword' => '%' . $_SESSION['keyword'] . '%']);

                foreach ($stmt as $row) {
                  echo '
                      <li class="list-group-item m-0 view-product" data-id="' . $row['section_id'] . '">
                        <i class="fas fa-box text-secondary"></i>
                        <span class="fw-bold">' . $row['product_name'] . '</span> from 
                        <span class="fst-italic">' . $row['stall_name'] . '</span>
                      </li>
                    ';
                }
              } catch (PDOException $e) {
                echo '
                    <li class="list-group-item m-0">' . $e->getMessage() . '</li>
                  ';
              }
            }
          }
          $pdo->close();
          ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnRemoveSearch" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_SESSION['user'])) {
  echo '
<div class="modal fade" id="editUserPersonalDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-light h4">Edit Personal Details</h5>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formEditPersonalDetails" method="POST" action="includes/users_inc_crud.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control user-id" name="id">
          <div class="mb-3">
            <label for="userFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="userFirstName" name="edit_first_name">
          </div>
          <div class="mb-3">
            <label for="userLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="userLastName" name="edit_last_name">
          </div>
          <div class="mb-3">
            <label for="userContactNumber" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="userContactNumber" name="edit_contact_number">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formEditPersonalDetails" class="btn btn-primary" name="edit_user_details"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="updateUsername" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light h4">Update Username</h5>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formChangeUsername" method="POST" action="includes/users_inc_crud.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control user-id" name="id">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
        </form>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary text-start" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formChangeUsername" class="btn btn-success" name="edit_username"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="updateUserEmail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light h4">Update Email</h5>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formChangeUserEmail" method="POST" action="includes/users_inc_crud.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control user-id" name="id">
          <div class="mb-3">
            <label for="userEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="userEmail" name="user_email">
          </div>
        </form>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary text-start" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formChangeUserEmail" class="btn btn-success" name="edit_user_email"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="changeUserPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-light h4">Change Password</h5>
        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formChangeUserPassword" method="POST" action="includes/users_inc_crud.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control user-id" name="id">
          <div class="mb-3">
            <label for="userPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="userPassword" name="user_password" placeholder="Enter New Password">
          </div>
          <div class="mb-3">
            <label for="userPassword" class="form-label">Retype Password</label>
            <input type="password" class="form-control" id="userRetypePassword" name="user_retype_password" placeholder="Retype Password">
          </div>
          <div class="form-group clearfix" id="userShowHidePassword">
            <input class="form-check-input" type="checkbox" id="showPassword" value="">
            <label for="showHidePassword" id="labelShowPassword">
              Show Password
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary text-start" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formChangeUserPassword" class="btn btn-success" name="edit_user_password"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editUserProfilePicture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-light h4">Change Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formChangeProfilePicture" method="POST" action="includes/users_inc_crud.php" enctype="multipart/form-data">
        <img class="img-thumbnail mx-auto d-block mb-2" id="updateProfilePicture" src="" onclick="triggerClick()">
        <input type="hidden" class="form-control user-id" name="id">
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload a new profile picture</label>
          <input class="form-control" type="file" id="changeProfilePicture" name="profile_picture" onchange="displayImage(this)">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formChangeProfilePicture" class="btn btn-info text-light" name="change_user_profile"><i class="fa fa-save"></i> Update</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deactivateUserAccount" >
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light h4">Deactivate Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column justify-content-center align-items-center">
        <i class="fa fa-exclamation-triangle fa-5x text-danger mb-3"></i>
        <h5 class="text-center">Are you sure you want to deactivate this account?</h5>
        <p class="text-center text-danger">
          Proceeding with this operation will make this account unavailable for accessing <span class="fw-bold">PalengkeGO Map</span>
        </p>
        <form id="formDeleteUserAccount" method="POST" action="includes/users_inc_crud.php" enctype="multipart/form-data">
        <input type="hidden" class="form-control user-id" name="id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" form="formDeleteUserAccount" class="btn btn-danger" name="deactivate_user_account"><i class="fa fa-save"></i> Confirm</button>
      </div>
    </div>
  </div>
</div>
  ';
} else if (isset($_SESSION['stallholder'])) {
  echo '';
} else {
  echo '';
}
?>
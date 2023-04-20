<?php
include '../_session.php';
include '_admin_redirect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- HEADER -->
  <?php include 'pages/header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <!-- NAVBAR -->
    <?php include 'pages/navbar.php' ?>

    <!-- SIDEBAR -->
    <?php include 'pages/sidebar.php' ?>

    <!-- CONTENT -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>List of Users</h1>
            </div>
            <div class="col-sm-6">
              <!-- BREADCRUMB -->
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="my-3 mx-3 d-flex justify-content-start align-items-center">
                  <!-- ADD USER -->
                  <button data-toggle="modal" data-target="#addUser" id="addBtn" class="btn-add btn btn-primary">
                    <span class="fa fa-plus pr-2"></span>
                    Add New User
                  </button>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="users-table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Account</th>
                        <th>Account Type</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_users_fetch.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>

    <!-- MODALS -->
    <?php include 'dist/modal_users.php' ?>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/scripts.php' ?>
  <script>
    // =======================================
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      $("#users-table").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });
    });

    // =======================================
    // FOR PROFILE PICTURE : CHANGING DISPLAY OF CURRENT PROFILE PICTURE AFTER CHOOSING A FILE
    // =======================================
    function displayImage(e) {
      if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.querySelector('#updateProfilePicture').setAttribute('src', e.target.result);
          document.querySelector('#addUserProfile').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }

    // =======================================
    // FOR PASSWORD : SHOWING AND HIDING PASSWORD
    // =======================================
    $(function() {
      $(document).on("click", ".show-hide-password", function(e) {
        let password = $(".password");
        let repassword = $(".retype-password")
        let label_pass = $(".label-password");
        if (password.attr("type") == "password") {
          password.attr("type", "text");
          repassword.attr("type", "text");
          label_pass.text("Hide Password");
        } else {
          password.attr("type", "password");
          repassword.attr("type", "password");
          label_pass.text("Show Password");
        }
      });
    });

    // =======================================
    // FOR CRUD : SHOWING MODALS
    // =======================================
    // CLICK TO SHOW MODAL FUNCTION
    $(function() {
      // FOR ADD
      $(document).on("click", ".btn-add", function(e) {
        e.preventDefault();
        $("#modalAddUser").modal("show");
      });

      // FOR EDIT
      $(document).on("click", ".btn-edit", function(e) {
        e.preventDefault();
        $("#modalEditUser").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR EDIT USERNAME
      $(document).on("click", ".btn-edit-username", function(e) {
        e.preventDefault();
        $("#modalEditUsername").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR EDIT EMAIL
      $(document).on("click", ".btn-edit-email", function(e) {
        e.preventDefault();
        $("#modalEditUserEmail").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR DELETE
      $(document).on("click", ".btn-delete", function(e) {
        e.preventDefault();
        $("#modalDeleteUser").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR UPLOAD PROFILE
      $(document).on("click", ".btn-profle", function(e) {
        e.preventDefault();
        $("#modalProfileUser").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR MAKING USER TO ADMIN
      $(document).on("click", ".btn-make-admin", function(e) {
        e.preventDefault();
        $("#modalMakeAdmin").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR MAKING ADMIN TO USER
      $(document).on("click", ".btn-make-user", function(e) {
        e.preventDefault();
        $("#modalMakeUser").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR CHANGING USER STATUS
      $(document).on("click", ".btn-verify", function(e) {
        e.preventDefault();
        $("#modalVerifyAccount").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR CHANGING USER STATUS
      $(document).on("click", ".btn-unverify", function(e) {
        e.preventDefault();
        $("#modalUnverifyAccount").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR ACTIVATING ACCOUNT
      $(document).on("click", ".btn-reactivate", function(e) {
        e.preventDefault();
        $("#modalReactivateAccount").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR DEACTIVATING ACCOUNT
      $(document).on("click", ".btn-deactivate", function(e) {
        e.preventDefault();
        $("#modalDeactivateAccount").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FUNCTION FOR GETTING DATA FROM DB
      function getRow(id) {
        $.ajax({
          type: 'POST',
          url: '_users_getRow.php',
          data: {
            id: id,
          },
          dataType: 'JSON',
          success: function(response) {
            // ID AND USER FULL NAME
            $(".user-id").val(response.id);
            $(".full-name").html(response.first_name + " " + response.last_name);

            // PROFILE PICTURE
            if (response.profile_picture == "") {
              $("#updateProfilePicture").attr("src", "../src/profile/default_user.png");
            } else {
              $("#updateProfilePicture").attr("src", "../src/profile/" + response.profile_picture);
            }

            // EDIT USERNAME
            $(".username").val(response.username);

            // EDIT EMAIL
            $(".email").val(response.email);

            // EDIT USER DETAILS
            $("#editFirstName").val(response.first_name);
            $("#editLastName").val(response.last_name);
            $("#editContactNumber").val(response.contact_number);
            $("#editPassword").val(response.password);
          },
        });
      }
    });
  </script>
</body>

</html>
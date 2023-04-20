<?php
include '../_session.php';
include '_admin_redirect.php';

if (!isset($_GET['id'])) {
  header('location: dashboard.php');
  exit();
}

$stallholder_id =  $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM stall_holders WHERE id=:id");
$stmt->execute(['id' => $stallholder_id]);
$row = $stmt->fetch();

$stallholder_name = $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- HEADER -->
  <?php include 'pages/header.php'; ?>
  <style>
    .bg-main,
    .card-main {
      background-color: #25AB7B !important;
    }

    .bg-main:hover {
      background-color: #1C805C !important;
    }

    .btn-main {
      background-color: #25AB7B !important;
      color: #fff !important;
    }

    .btn-main:hover {
      background-color: #1C805C !important;
      color: #fff !important;
    }
  </style>
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
              <h1>Vendors/Helpers of <?php echo $stallholder_name ?></h1>
            </div>
            <div class="col-sm-6">
              <!-- BREADCRUMB -->
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Vendor/Helper</li>
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
                <div class="card-header">
                  <button id="addBtn" class="m-2 btn-add btn btn-primary">
                    <span class="fa fa-plus pr-2"></span>
                    Add New Vendor/Helper
                  </button>
                  <div class="alert alert-info d-none w-100" id="limitVendorHelper">
                    <h5><i class="icon fas fa-info"></i>Vendor/Helper Limit!</h5>
                    <p>You have reached the limit for adding new vendor/helper</p>
                  </div>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="tableVendorHelper" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Vendor/Helper Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Added on</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody id="tableBody">
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_vendor_helper_fetch.php' ?>
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
    <?php include 'dist/modal_vendor_helper.php' ?>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/scripts.php' ?>
  <script>
    // =======================================
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      $("#tableVendorHelper").DataTable({
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
    // FOR TABLE ROW : CHECK LIMIT
    // =======================================
    $(function() {
      $(document).ready(function() {
        // CHECK THE NUMBER OF VENDOR : LIMIT TO 3
        $(function() {
          var rowCount = $('#tableBody tr').length;
          if (rowCount == 3) {
            $('#addBtn').hide();
            $('#limitVendorHelper').removeClass('d-none');
          } else {
            $('#addBtn').show();
            $('#limitVendorHelper').addClass('d-none');
          }
        });
      });
    });

    // =======================================
    // FOR CRUD : MODAL SHOW AND ADD VALUE
    // =======================================

    $(function() {
      var stallholder_id = <?php echo $stallholder_id ?>;
      $(".stallholder-id").val(stallholder_id);

      $(document).on("click", ".btn-add", function(e) {
        e.preventDefault();
        $("#modalAddVendorHelper").modal('show');
      });

      $(document).on("click", ".btn-edit-vendor", function(e) {
        e.preventDefault();
        $("#modalEditVendorHelper").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      $(document).on("click", ".btn-delete-vendor", function(e) {
        e.preventDefault();
        $("#modalDeleteVendorHelper").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });
    });

    // FOR GETTING DATA FROM DB
    function getRow(id) {
      $.ajax({
        type: "POST",
        url: "_vendor_helper_getRow.php",
        data: {
          id: id,
        },
        dataType: "json",
        success: function(response) {
          // ID
          $(".vendor-helper-id").val(response.id);
          // NAME
          $(".vendor-helper-name").html(response.vendor_helper_name);
          // EDIT NAME, ADDRESS, CONTACT, ROLE
          $(".edit-vendor-helper-name").val(response.vendor_helper_name);
          $(".edit-vendor-helper-address").val(response.address);
          $(".edit-vendor-helper-contact").val(response.contact_number);
          $("input:radio[name=edit_role][value=" + response.role + "]").prop('checked', true);
        },
      });
    }
  </script>
</body>

</html>
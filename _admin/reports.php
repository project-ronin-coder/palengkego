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
              <h1>Reports</h1>
            </div>
            <div class="col-sm-6">
              <!-- BREADCRUMB -->
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Reports</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="">
                    Choose a List
                  </h3>
                </div>
                <div class="card-body ">
                  <div class="btn-group flex-wrap w-100">
                    <button type="button" id="btnUsers" class="btn btn-primary">
                      <span class="mr-2">List of Users</span>
                      <i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="btnApplicants" class="btn btn-success">
                      <span class="mr-2">List of Applicants</span>
                      <i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="btnStallholders" class="btn btn-info">
                      <span class="mr-2">List of Stallholders</span>
                      <i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="btnAssigned" class="btn btn-warning">
                      <span class="mr-2">List of Assigned Stalls</span>
                      <i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="btnUnassigned" class="btn btn-danger">
                      <span class="mr-2">List of Unassigned Stalls</span>
                      <i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="btnProducts" class="btn btn-secondary">
                      <span class="mr-2">List of Products</span>
                      <i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="btnVendorHelper" class="btn btn-dark">
                      <span class="mr-2">List of Vendors/Helpers</span>
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- TABLE: USER -->
            <div class="col-12" id="containerUser">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-primary">
                  <span class="font-weight-bold h4">List of Users</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableUserList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Account</th>
                        <th>Account Type</th>
                        <th>Date Added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchUserTable.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- TABLE: APPLICANTS -->
            <div class="col-12" id="containerApplicants">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-success">
                  <span class="font-weight-bold h4">List of Applicants</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableApplicantsList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Status</th>
                        <th>Account</th>
                        <th>Account Type</th>
                        <th>Date Added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchApplicantsTable.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- TABLE: STALLHOLDER -->
            <div class="col-12" id="containerStallholder">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-info">
                  <span class="font-weight-bold h4">List of Stallholders</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableStallholdersList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Status</th>
                        <th>Account</th>
                        <th>Date Added</th>
                        <th>Renewal Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchStallholderTable.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- TABLE: ASSIGNED STALLS -->
            <div class="col-12" id="containerAssigned">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-warning">
                  <span class="font-weight-bold h4">List of Assigned Stalls</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableStallsAssignedList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Stall Name</th>
                        <th>Stall Owner Name</th>
                        <th>Stall Category</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Date Assigned</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchStallsAssignedTable.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- TABLE: UNASSIGNED STALLS -->
            <div class="col-12" id="containerUnassigned">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-danger">
                  <span class="font-weight-bold h4">List of Unassigned Stalls</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableStallsUnassignedList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Stall Name</th>
                        <th>Stall Owner Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Date Unassigned</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchStallsUnassignedTable.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- TABLE: PRODUCTS -->
            <div class="col-12" id="containerProducts">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-secondary">
                  <span class="font-weight-bold h4">List of Products</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableProductsList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Product Name</th>
                        <th>Stall Name</th>
                        <th>Stall Owner Name</th>
                        <th>Stall Section</th>
                        <th>Date Added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchProductsTable.php' ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- TABLE: VENDORS/HELPERS -->
            <div class="col-12" id="containerVendorHelper">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header bg-dark">
                  <span class="font-weight-bold h4">List of Vendors/Helpers</span>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="reportsTableVendorHelperList" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Vendor/Helper Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Role</th>
                        <th>Works For</th>
                        <th>Date Added</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_reports_fetchVendorHelperTable.php' ?>
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
    $(function() {
      $(document).ready(function() {
        $("#containerUser").hide();
        $("#containerApplicants").hide();
        $("#containerStallholder").hide();
        $("#containerAssigned").hide();
        $("#containerProducts").hide();
        $("#containerUnassigned").hide();
        $("#containerVendorHelper").hide();
      });
    });

    $(function() {


      $('#btnUsers').click(function() {
        $('#btnUsers').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerUser").toggle("fast");
      });
      $('#btnApplicants').click(function() {
        $('#btnApplicants').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerApplicants").toggle("fast");
      });
      $('#btnStallholders').click(function() {
        $('#btnStallholders').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerStallholder").toggle("fast");
      });
      $('#btnAssigned').click(function() {
        $('#btnAssigned').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerAssigned").toggle("fast");
      });
      $('#btnUnassigned').click(function() {
        $('#btnUnassigned').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerUnassigned").toggle("fast");
      });
      $('#btnProducts').click(function() {
        $('#btnProducts').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerProducts").toggle("fast");
      });
      $('#btnVendorHelper').click(function() {
        $('#btnVendorHelper').toggleClass("btn-primary btn-main");
        $("i", this).toggleClass("fa-times fa-check");
        $("#containerVendorHelper").toggle("fast");
      });
    })

    $(function() {

      $("#reportsTableUserList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#reportsTableUserList_wrapper .col-md-6:eq(0)');

      $("#reportsTableApplicantsList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#reportsTableApplicantsList_wrapper .col-md-6:eq(0)');

      $("#reportsTableStallholdersList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#reportsTableStallholdersList_wrapper .col-md-6:eq(0)');

      $("#reportsTableStallsAssignedList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#reportsTableStallsAssignedList_wrapper .col-md-6:eq(0)');

      $("#reportsTableStallsUnassignedList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]

      }).buttons().container().appendTo('#reportsTableStallsUnassignedList_wrapper .col-md-6:eq(0)');

      $("#reportsTableProductsList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#reportsTableProductsList_wrapper .col-md-6:eq(0)');

      $("#reportsTableVendorHelperList").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#reportsTableVendorHelperList_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>
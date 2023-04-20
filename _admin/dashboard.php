<?php
include '../_session.php';
include '_admin_redirect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'pages/header.php';
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <?php include 'pages/navbar.php' ?>
    <?php include 'pages/sidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- USER DATA -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php include 'row/usersVerified_rowCount.php'; ?></h3>

                  <p>Verified Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-check"></i>
                </div>
                <a href="users.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php include 'row/usersUnverified_rowCount.php'; ?></h3>

                  <p>Unverified Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-times"></i>
                </div>
                <a href="users.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php include 'row/applicants_rowCount.php'; ?></h3>

                  <p>Number of Applicants</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-tie"></i>
                </div>
                <a href="applicants.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php include 'row/stallholders_rowCount.php'; ?></h3>

                  <p>Number of Stallholders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-address-card"></i>
                </div>
                <a href="stallholders.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- STALL DATA -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php include 'row/stalls_rowCount.php'; ?></h3>

                  <p>Number of Stalls</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <a href="stalls_assigned.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php include 'row/stallsAssigned_rowCount.php'; ?></h3>

                  <p>Number of Assigned Stalls</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <a href="stalls_assigned.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php include 'row/stallsUnassigned_rowCount.php'; ?></h3>

                  <p>Number of Unassigned Stalls</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <a href="stalls_unassigned.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php include 'row/map_section_rowCount.php'; ?></h3>

                  <p>Number of Sections in Mariveles Public Market</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <a href="map.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- STALL DATA -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php include 'row/vendor_helper_rowCount.php'; ?></h3>

                  <p>Number of Vendors/Helpers</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <a href="stallholders.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php include 'row/products_rowCount.php'; ?></h3>

                  <p>Number of Products</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <a href="stalls_assigned.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'pages/footer.php' ?>
  </div>

  <?php include 'dist/scripts.php' ?>

</body>

</html>
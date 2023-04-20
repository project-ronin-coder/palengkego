<?php
include '../_session.php';
include '_redirect_stallholder.php';
include 'pages/stallholder_details.php';
include 'pages/stallholder_stallsGetRow.php';
include 'pages/stallholder_productsGetRow.php';
include 'pages/stallholder_vendorhelperGetRow.php';
include 'pages/home_getRowVacant.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PalengkeGO | Home</title>

  <?php include 'dist/styles_stallholder.php' ?>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- NAVBAR -->
    <?php include 'pages/navbar.php' ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Welcome to PalengkeGO!</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <!-- <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Mariveles Public Market Ordinance</h5>
                </div>
                <div class="card-body">
                </div>
              </div> -->
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Guide</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <li class="list-group-item mb-2 rounded">
                    <span class="font-weight-regular h4">Welcome Stallholder!</span>
                  </li>
                  <ul class="list-group mb-2">
                    <li class="list-group-item">
                      <span class="font-weight-bold h3">1</span> If you are new to PalengkeGO, you can start by checking and editing your personal details and account details.
                      Click your name at the menu bar and go to <span class="font-weight-bold">My Account</span> or click <a href="account.php"><span class="font-weight-bold">this</span></a> to proceed
                    </li>
                    <li class="list-group-item">
                      <span class="font-weight-bold h3">2</span> You may now proceed to <a href="stalls.php"><span class="font-weight-bold">Stalls</span></a>.
                      <span class="font-weight-bold">Stalls Tab</span> is where you have access to your stalls by uploading your stall photo and editing your stall name.
                      Note! If you are unassigned to any stalls, you cannot add products on any stalls.
                      Please contact the Mariveles Public Market Office for inquiries.
                    </li>
                    <li class="list-group-item">
                      <span class="font-weight-bold h3">3</span> Click on the <a href="products.php"><span class="font-weight-bold">Products</span></a> to see the list of products you have per stall. Click Add Products if you want to add a product for your stall.
                      <span class="font-weight-bold">PalengkeGO</span> also provides stallholder with the ability to edit and delete products in their stall.
                    </li>
                    <li class="list-group-item">
                      <span class="font-weight-bold h3">4</span> If you are a stallholder, and you have your own helpers and vendors in your stalls.
                      You can add them <a href="vendor_helper.php"><span class="font-weight-bold">here</span></a>
                      The limit for adding helpers and vendors is 3.
                    </li>
                    <li class="list-group-item">
                      <span class="font-weight-bold h3">5</span> If you are interested in owning another stall in the public market of Mariveles Bataan. You can check all the vacant sections <a href="map.php"><span class="font-weight-bold">here</span></a> or click on <span class="font-weight-bold">Go To Map</span> in the Home Tab
                    </li>
                    <li class="list-group-item">
                      Thank you for being part of the Mariveles Public Market. Again, welcome to <span class="font-weight-bold">PalengkeGO</span>.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-outline-main card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Featured</h5>
                </div>
                <div class="card-body">
                  <a href="products.php">
                    <div class="info-box ">
                      <span class="info-box-icon bg-primary"><i class="fa fa-box"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text text-dark">No. of Products</span>
                        <span class="info-box-number text-dark"><?php echo $products_owned_row; ?></span>
                      </div>
                    </div>
                  </a>
                  <a href="stalls.php">
                    <div class="info-box ">
                      <span class="info-box-icon bg-success"><i class="fa fa-store"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text text-dark">No. of Stalls</span>
                        <span class="info-box-number text-dark"><?php echo $stalls_owned_row; ?></span>
                      </div>
                    </div>
                  </a>
                  <a href="vendor_helper.php">
                    <div class="info-box ">
                      <span class="info-box-icon bg-info"><i class="fa fa-user-friends"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text text-dark">No. of Vendors/Helpers</span>
                        <span class="info-box-number text-dark"><?php echo $vendor_helper_row; ?></span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card card-outline-main card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Vacant Sections</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">No. of Vacant Sections: <span><?php echo $vacant_sections; ?></span></h6>
                </div>
                <div class="card-footer d-flex justify-content-end">
                  <a href="map.php" class="btn btn-primary">
                    <span class="mr-2">Check Map</span>
                    <i class="fa fa-arrow-alt-circle-right"></i>
                  </a>
                </div>
              </div>
              <div class="card card-outline-main card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Try PalengkeGO</h5>
                </div>
                <div class="card-body">
                  <a href="../index.php" class="btn btn-primary w-100">
                    <span class="mr-2">Click here to proceed</span>
                    <i class="fa fa-arrow-alt-circle-right"></i>
                  </a>
                </div>
                <div class="card-footer d-flex justify-content-end">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>
  </div>
  <?php include 'dist/scripts_stallholder.php' ?>
  <script>
    // =======================================
    // FOR NAVBAR : ADD ACTIVE LINK TO NAVBAR
    // =======================================
    $(function() {
      $(document).ready(function() {
        $("#navlinkHome").addClass("active-link");
      });
    });
  </script>
</body>

</html>
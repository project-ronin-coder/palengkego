<?php
include '../_session.php';
include '_redirect_stallholder.php';
include 'pages/stallholder_details.php';
include 'pages/stallholder_stallsGetRow.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PalengkeGO</title>

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
              <h1 class="m-0">My Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-11 col-sm-12">
              <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-store pr-1"></i>
                    Products
                  </h3>
                </div>
                <div class="card-body row justify-content-center">
                  <?php include 'fetch/_products_fetchProducts.php' ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
        $("#navlinkProducts").addClass("active-link");
      });
    });

    // =======================================
    // FOR PRODUCTS : LIMIT LIST ITEMS
    // =======================================
    $(function() {
      $("ul.products-group").each(function() {
        $("li:gt(5)", this).hide(); /* :gt() is zero-indexed */
        $("li:nth-child(6)", this).after(
          "<li class='list-group-item p-0 rounded-0 li-redirect'><button type='submit' class='w-100 btn p-2 m-0 rounded-0 btn-redirect' name='redirect'>See more...</button></li>"
        ); /* :nth-child() is one-indexed */
      });
    });
  </script>
</body>

</html>
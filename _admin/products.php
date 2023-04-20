<?php
include '../_session.php';
include '_admin_redirect.php';

if (!isset($_GET['id'])) {
  header('location: dashboard.php');
  exit();
}

$stall_id =  $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM stalls_owned WHERE id=:id");
$stmt->execute(['id' => $stall_id]);
$row = $stmt->fetch();

$stall_id = $row['id'];
$stallholder_id = $row['stall_holder_id'];
$section_id = $row['stall_id'];
$stall_name = $row['stall_name'];
$stall_photo = $row['stall_photo'];

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
              <h1>Products of <?php echo $stall_name ?></h1>
            </div>
            <div class="col-sm-6">
              <!-- BREADCRUMB -->
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-lg-6">
              <div class="card card-primary border border-primary">
                <div class="card-header">
                  <h3 class="card-title">Upload Product List</h3>
                </div>
                <form action="includes/products_crud.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="product-list-image mb-3">
                      <img class="img-thumbnail w-100 mx-auto d-block" id="stallProductList" src="../src/stall_photo/default_stall.png" onclick="triggerClick()" style="flex-shrink: 0;">
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" class="stall-id" id="stallId" name="stall_id">
                        <input type="file" class="form-control custom-file-input product-list" id="productList" name="product_list" onchange="displayImage(this)">
                        <label class="custom-file-label" for="valid-id">Upload stall's product list</label>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-end">
                    <button type="submit" id="convertToText" class="btn btn-primary mb-3" name="convert_image_to_text">
                      <span class="text-white">Convert to text</span>
                      <span class="fa fa-sync pl-2"></span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- right column -->
            <div class="col-lg-6">
              <div class="card card-success border border-success">
                <div class="card-header">
                  <h3 class="card-title">Image Converted to Text</h3>
                </div>
                <div class="card-body">
                  <textarea name="" id="textStallProductList" style="width: 100%; max-width: 100%; height: 75vh;">
                  <?php
                  if (isset($_SESSION['converted_image'])) {
                    $row = $_SESSION['converted_image'];
                    if ($row == "") {
                      echo 'No Image Found';
                    } else {
                      echo $row;
                    }
                  }
                  $pdo->close();
                  ?></textarea>
                </div>
                <div class="card-footer ">
                  <div class="d-flex justify-content-between align-items-center">
                    <form action="includes/products_crud.php" enctype="multipart/form-data" method="POST" id="refreshPage">
                      <input type="hidden" class="stall-id" id="stallId" name="stall_id">
                      <!-- ADD USER -->
                      <button type="submit" class="btn btn-success " name="refresh_page">
                        <span class="fa fa-angle-double-left pr-2"></span>
                        <span class="text-white">Remove</span>
                      </button>
                    </form>
                    <!-- ADD USER -->
                    <button type="button" id="convertToText" class="btn btn-success convert">
                      <span class="text-white">Append</span>
                      <span class="fa fa-angle-double-right pl-2"></span>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header ">
                  <div class="d-flex justify-content-between align-items-center">
                    <button id="addBtn" class="m-2 btn-add btn btn-primary">
                      <span class="fa fa-plus pr-2"></span>
                      Add New Product
                    </button>
                    <button type="submit" id="btnDeleteAllProducts" class="m-2 btn btn-danger">
                      <span class="fa fa-trash pr-2"></span>
                      Delete All Products
                    </button>

                  </div>
                </div>
                <hr class="m-0">
                <!-- BODY -->
                <div class="card-body">
                  <table id="products-table" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- TABLE HEAD -->
                        <th>Product Name</th>
                        <th>Added on</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- TABLE DATA -->
                      <?php include 'fetch/_products_fetch.php' ?>
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
    <?php include 'dist/modal_products.php' ?>
  </div>

  <!-- SCRIPTS -->
  <?php include 'dist/scripts.php' ?>
  <script>
    // =======================================
    // FOR INITIALIZATION : ADD VALUE 
    // =======================================
    $(function() {
      var stall_id = <?php echo $stall_id ?>;
      var stallholder_id = <?php echo $stallholder_id ?>;
      var section_id = <?php echo $section_id ?>;
      $(".stall-id").val(stall_id);
      $(".stallholder-id").val(stallholder_id);
      $(".section-id").val(section_id);
    });

    // =======================================
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================
    $(function() {
      bsCustomFileInput.init();
      $("#products-table").DataTable({
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
    // FOR MODAL : MODAL SHOW
    // =======================================
    $(function() {
      // FOR ADD
      $(document).on("click", ".btn-add", function(e) {
        e.preventDefault();
        $("#addProducts").modal("show");
      });

      // FOR DELETE
      $(document).on("click", "#btnDeleteAllProducts", function(e) {
        e.preventDefault();
        $("#deleteAllProducts").modal("show");
      });
    })

    // =======================================
    // FOR CONVERT : CONVERT, APPEND, ADD MORE, REMOVE PRODUCTS
    // =======================================
    $(function() {
      // CONVERT
      $(document).on('click', '.convert', function() {
        var lines = $('textarea').val().split('\n');
        for (var i = 0; i < lines.length; i++) {
          $('.add-new-form').append('<div class="main-form mt-3 border-bottom">\
                            <div class="form-group mb-2">\
                              <label for="">Product Name</label>\
                              <div class="input-group mb-2">\
                                <input type="text" value="' + lines[i] + '" name="product_name[]" class="form-control" required placeholder="Enter Product Name">\
                                <div class="input-group-append">\
                                  <div class="input-group-text">\
                                    <span class="fa fa-box"></span>\
                                  </div>\
                                </div>\
                                <div class="input-group-append">\
                                  <button type="button" class="remove-btn btn btn-danger">\
                                    <span class="fa fa-times"></span>\
                                  </button>\
                                </div>\
                              </div>\
                            </div>\
                          </div>');
        }
        $("#addProducts").modal("show");
      });

      // ADD MORE PRODUCT
      $(document).on('click', '.add-more-product', function() {
        $('.add-new-form').append('<div class="main-form mt-3 border-bottom">\
            <div class="form-group mb-2">\
              <label for="">Product Name</label>\
              <div class="input-group mb-2">\
                <input type="text" name="product_name[]" class="form-control" required placeholder="Enter Product Name">\
                <div class="input-group-append">\
                  <div class="input-group-text">\
                    <span class="fa fa-box"></span>\
                  </div>\
                </div>\
                <div class="input-group-append">\
                  <button type="button" class="remove-btn btn btn-danger">\
                    <span class="fa fa-times"></span>\
                  </button>\
                </div>\
              </div>\
            </div>\
          </div>');
      });

      // REMOVE
      $(document).on('click', '.remove-btn', function() {
        $(this).closest('.main-form').remove();
      });
    });

    // =======================================
    // FOR CRUD: MODAL SHOW
    // =======================================

    $(function() {
      // FOR EDIT
      $(document).on("click", ".btn-edit-product", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        getRow(id);
        $("#editProduct").modal("show");
      });
      // FOR DELETE
      $(document).on("click", ".btn-delete-product", function(e) {
        e.preventDefault();
        $("#deleteProduct").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });
      // FOR GETTING PRODUCTS DATA FROM DB
      function getRow(id) {
        $.ajax({
          type: "POST",
          url: "_products_getRow.php",
          data: {
            id: id,
          },
          dataType: "JSON",
          success: function(response) {
            // PRODUCT ID
            $("#deleteProductId").val(response.id);
            // PRODUCT NAME
            $(".product-name").html(response.product_name);

            // EDIT
            $("#editProductId").val(response.id);
            $("#editProductName").val(response.product_name);
            $("#editProductPrice").val(response.product_price);
          },
        });
      }
    });
  </script>
</body>

</html>
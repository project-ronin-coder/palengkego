<?php
include '../_session.php';
include '_redirect_stallholder.php';
include 'pages/stallholder_details.php';
// include 'pages/stallholder_stallsGetRow.php';

if (!isset($_GET['id'])) {
  header('location: products.php');
  exit();
} else {
  $stall_id =  $_GET['id'];

  $stmt = $conn->prepare("SELECT * FROM stalls_owned WHERE id=:id");
  $stmt->execute(['id' => $stall_id]);
  $row = $stmt->fetch();

  $stall_name = (!empty($row['stall_name'])) ? $row['stall_name'] : $stallholder_fullname . "'s Stall";
  $stall_photo = (!empty($row['stall_photo'])) ? '../src/stall_photo/' . $row['stall_photo'] : '../src/stall_photo/default_stall.png';
  $section_id = $row['stall_id'];
}

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
              <h1 class="m-0">View Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">View Products</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-11 col-md-12 col-sm-12">
              <div class='card'>
                <div class='card-header card-main pb-2'>
                  <h4 class='card-title text-white'><?php echo $stall_name ?></h4>
                  <div class='card-tools'>
                    <button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus text-white'></i>
                    </button>
                  </div>
                </div>
                <div class='card-body border border-main p-2 w-100'>
                  <div class='stall-header p-2 border border-main border-bottom-0'>
                    <img class='img-thumbnail mx-auto d-block' src='<?php echo $stall_photo ?>'>
                  </div>
                  <hr class="m-0">
                  <div class="table border border-main border-top-0 p-2">
                    <!-- HEADER -->
                    <div class="my-3 mx-1 d-flex justify-content-start align-items-center">
                      <!-- ADD PRODUCT -->
                      <button id="btnAddProduct" class="add btn btn-primary m-2">
                        <span class="fa fa-plus pr-2"></span>
                        Add Product
                      </button>
                      <button id="btnDeleteAllProducts" class="add btn btn-danger ml-auto">
                        <span class="fa fa-trash pr-2"></span>
                        Delete All Products
                      </button>
                    </div>
                    <hr>
                    <!-- BODY -->
                    <div class="card-body p-0">
                      <table id="tableStallProducts" class="table table-bordered table-striped">
                        <thead class="thead-main">
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
          </div>
        </div>
      </section>
    </div>
    <!-- FOOTER -->
    <?php include 'pages/footer.php' ?>
  </div>

  <?php include 'dist/modal_products.php' ?>
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
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================

    $(function() {
      $("#tableStallProducts").DataTable({
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
    // FOR STALL ID : INITIALIZE
    // =======================================
    $(function() {
      var stall_id = <?php echo $stall_id ?>;
      $(".stall-id").val(stall_id);
    });

    // =======================================
    // FOR CRUD : MODAL SHOW
    // =======================================
    $(function() {
      // FOR ADD
      $(document).on("click", "#btnAddProduct", function(e) {
        e.preventDefault();
        var stallholder_id = <?php echo $stallholder_id ?>;
        var stall_id = <?php echo $stall_id ?>;
        var section_id = <?php echo $section_id ?>;
        $("#modalAddProducts").modal("show");
        $("#stallholderId").val(stallholder_id);
        $("#stallId").val(stall_id);
        $("#sectionId").val(section_id);
      });

      // FOR ADD MORE
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

      // FOR REMOVE ADDING PRODUCT
      $(document).on('click', '.remove-btn', function() {
        $(this).closest('.main-form').remove();
      });

      // FOR EDIT
      $(document).on("click", ".btn-edit-product", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        getRow(id);
        $("#modalEditProduct").modal("show");
      });

      // FOR DELETE
      $(document).on("click", ".btn-delete-product", function(e) {
        e.preventDefault();
        $("#modalDeleteProduct").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR DELETE ALL PRODUCTS
      $(document).on("click", "#btnDeleteAllProducts", function(e) {
        e.preventDefault();
        $("#modalDeleteAllProducts").modal("show");

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
            $("#deleteProductId").val(response.id);
            $(".product-name").html(response.product_name);

            $("#editProductId").val(response.id);
            $("#editProductName").val(response.product_name);
            $("#editProductPrice").val(response.product_price);
          },
        });
      }
    })
  </script>
</body>

</html>

<?php
unset($_SESSION['stall_id']);

?>
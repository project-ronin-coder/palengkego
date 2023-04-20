<?php
include '../_session.php';
include '_admin_redirect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'pages/header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <?php include 'pages/navbar.php' ?>
    <?php include 'pages/sidebar.php' ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>List of Unassigned Stalls</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item "><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item ">Stalls</li>
                <li class="breadcrumb-item active">List of Unassigned Stalls</li>
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
                <div class="my-3 mx-3 d-flex justify-content-start align-items-center">
                  <form action="includes/stallsUnassigned_crud.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <button type="submit" id="assignStallholder" class="btn btn-success" name="redirect_to_map">
                      <span class="fa fa-plus pr-2"></span>
                      Reassign Stallholder
                    </button>
                  </form>
                </div>
                <hr class="m-0">
                <div class="card-body">
                  <table id="tableStallsUnassigned" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Stall Photo</th>
                        <th>Stall Name</th>
                        <th>Stall Owner Name</th>
                        <th>Product List</th>
                        <th>Date Applied</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php include 'fetch/_stalls_unassignedFetch.php' ?>
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
    <?php include 'pages/footer.php' ?>
    <?php include 'dist/modal_stallsUnassigned.php' ?>
  </div>
  <?php include 'dist/scripts.php' ?>
  <script>
    // =======================================
    // FOR TABLE : DISPLAY FUNCTIONALITIES
    // =======================================

    $(function() {
      bsCustomFileInput.init();
      $("#tableStallsUnassigned").DataTable({
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
          // Upload
          document.querySelector('#newStallPhoto').setAttribute('src', e.target.result);
          // Add
          document.querySelector('#addStallPhoto').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }

    // =======================================
    // FOR CRUD : MODAL SHOW
    // =======================================
    $(function() {
      // FOR EDIT
      $(document).on("click", ".btn-edit", function(e) {
        e.preventDefault();
        $("#editStall").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR DELETE
      $(document).on("click", ".btn-delete", function(e) {
        e.preventDefault();
        $("#deleteStall").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR UPLOAD STALL PHOTO
      $(document).on("click", ".btn-photo", function(e) {
        e.preventDefault();
        $("#photoStall").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR VIEW PRODUCTS
      $(document).on("click", ".btn-view", function(e) {
        e.preventDefault();
        $("#viewProducts").modal("show");
        var id = $(this).data("id");
        getRow(id);
      });

      // FOR GETTING DATA FROM DB
      function getRow(id) {
        $.ajax({
          type: "POST",
          url: "_stalls_unassignedGetRow.php",
          data: {
            id: id,
          },
          dataType: "json",
          success: function(response) {
            $(".stall-id").val(response.id);
            $(".stallholder").html(response.first_name + " " + response.last_name);
            if (response.stall_name == "") {
              $(".stall-name").html(response.first_name + " " + response.last_name + "\'s Stall");
            } else {
              $(".stall-name").html(response.stall_name);
            }
            $(".address").html(response.address);
            $(".contact-number").html(response.contact_number);
            $(".email").html(response.email);


            // =================
            // STALLPHOTO
            // =================
            // STALLPHOTO
            if (response.stall_photo == "") {
              $("#newStallPhoto").attr("src", "../src/stall_photo/default_stall.png");
            } else {
              $("#newStallPhoto").attr("src", "../src/stall_photo/" + response.stall_photo);
            }

            // =================
            // EDIT
            // =================
            // EDIT STALL NAME
            if (response.stall_name == "") {
              $("#editStallName").val(response.first_name + " " + response.last_name + "\'s Stall");
            } else {
              $("#editStallName").val(response.stall_name);
            }

            // =================
            // VIEW PRODUCTS
            // =================
            // VIEW: STALL NAME
            if (response.stall_name == "") {
              $("#viewStallName").html(response.first_name + " " + response.last_name + "\'s Stall");
            } else {
              $("#viewStallName").html(response.stall_name);
            }
            // VIEW: STALLHOLDER
            $("#viewStallholder").html(response.first_name + " " + response.last_name);
            // VIEW: STALL PHOTO
            if (response.stall_photo == "") {
              $("#stallPhoto").attr("src", "../src/stall_photo/default_stall.png");
            } else {
              $("#stallPhoto").attr("src", "../src/stall_photo/" + response.stall_photo);
            }

            // PRODUCTS
            var products_html = ''
            if (response.products_row_count < 1) {
              products_html = '<li class="list-group-item">No Products Found</li>';
            } else {
              $(response.product_name).each(function(k, v) {
                products_html += '<li class="list-group-item">' + v.product_name + '</li>'
              })
            }
            $('#viewProducts ul').html(products_html)

            // VENDORS/HELPERS
            var vendor_html = ''
            if (response.vendor_helper_name < 1) {
              vendor_html = '<li class="list-group-item">No Products Found</li>';
            } else {
              $(response.vendor_helper_name).each(function(k, v) {
                vendor_html += '<li class="list-group-item d-flex justify-content-between align-items-center"><span>' + v.vendor_helper_name + '</span><span>' + v.role + '</span></li>'
              })
            }

            $('#editStall ul').html(vendor_html)

            $(function() {
              $("ul.product-group").each(function() {
                $("li:gt(4)", this).hide();
                $("li:nth-child(5)", this).after(
                  "<li class='list-group-item text-center'>...</li>"
                );
              });
            });
          },
        });
      }
    });
  </script>
</body>

</html>